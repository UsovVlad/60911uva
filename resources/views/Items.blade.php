<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
    <h2>Список товаров</h2>
    <table border="1">
        <tr>
            <td>id</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Категория</td>
            <td>Действия</td>
        </tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->category->name}}</td>
            <td>
                <a href = "{{url('item/destroy/'.$item->id)}}">Удалить</a>
                <a href = "{{url('item/edit/'.$item->id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>
