<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style>.is-invalid { color: red; }</style>
</head>
    <body>
        <h2>Редактирование товара</h2>
        <form method="post" action={{url('item/update/'.$item->id)}}/>
            @csrf
            <label>Наименование</label>
            <input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$item->name}} @endif "/>
            @error('name')
            <div class="is-invalid">{{ $message }}</div>
            @enderror

            <label>Цена</label>
            <input type="text" name="price" value="@if (old('name')) {{old('price')}} @else {{$item->price}} @endif "/>
            @error('price')
            <div class="is-invalid">{{ $message }}</div>
            @enderror

            <label>Категория:</label>
            <select name = "category_id" value = "{{ old('category_id') }}">
                <option style="...">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                           @if(old('category_id'))
                               @if(old('category_id') == $category->id) selected @endif
                           @else
                               @if($item->category_id == $category->id) selected @endif
                           @endif>{{$category->name}}</option>
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="is-invalid">
                    {{ $message }}
                </div>
            @enderror

            <br>
                <input type="submit">
        </form>
    </body>
</html>
