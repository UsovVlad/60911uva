@extends('layout')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
    <h2>Список товаров</h2>
    <table border="1">
        <tr>
            <td>id</td>
            <td>Категория</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Действия</td>
            <td>Редактирование </td>
        </tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>
                <form id="add-to-cart-form-{{$item->id}}" action="{{ route('cart.add', $item->id) }}" method="post">
                    @csrf
                    <!-- Используем data атрибут для хранения ID товара -->
                    <button type="button" class="add-to-cart-button" data-item-id="{{$item->id}}">Добавить в корзину</button>
                </form>
            </td>
            <td>
                <a href = "{{url('item/destroy/'.$item->id)}}">Удалить</a>
                <a href = "{{url('item/edit/'.$item->id)}}">Редактировать</a>
            </td>
        </tr>
        @endforeach
        </table>
    <div>
        {{ $items->links() }}
    </div>
</body>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {// JavaScript для отправки AJAX-запроса
    var addToCartButtons = document.querySelectorAll('.add-to-cart-button');
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var itemId = this.dataset.itemId; // ID товара
            var form = document.getElementById('add-to-cart-form-' + itemId); // Находим соответствующую форму
            var formData = new FormData(form); // Содаем объект FormData из формы

            // Отправляем AJAX-запрос
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            })
            .then(function(response) {
                if (response.ok) {
                    alert('Товар успешно добавлен в корзину!');
                } else {
                    throw new Error('Ошибка при добавлении товара в корзину');
                }
            })
            .catch(function(error) {
                alert(error.message);
            });
        });
    });
});
</script>

