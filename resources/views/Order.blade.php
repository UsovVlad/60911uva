<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$order ? "Список товаров заказов № ".$order->id : 'Неверный ID заказа'}}</h2>
     @if($order)
     <table border="1">
        <tr>
            <td>id</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Количество</td>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->price}}</td>
                <td>{{$item->pivot->quantity}}</td>
            </tr>
       @endforeach
    </table>
    <h2>{{"Итого: ".$total->total}}</h2>
@endif
</body>
</html>
