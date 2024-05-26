@extends('layout')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body class="container">
    <h1>Ваша корзина</h1>
    @if(count($cartItems) > 0)
        <table border="1">
        <tr>
            <td>id</td>
            <td>Категория</td>
            <td>Наименование товара</td>
            <td>Цена</td>
            <td>Действия</td>
        </tr>
        @foreach($cartItems as $index => $item)
        <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->item->category->name}}</td>
            <td>{{$item->item->name}}</td>
            <td>{{$item->item->price}}</td>

            <td>
                <form action="{{ route('cart.remove', $item->item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
        <h4>Общая сумма корзины: {{ $total }} р.</h4>
    @else
        <p>Ваша корзина пуста.</p>
    @endif
</body>
@endsection
