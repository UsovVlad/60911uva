<style>
    .navbar-nav{
        background-color: #343a40;
    }
    .navbar-brand{
        color: black !important;
    }
    .nav-link, .dropdown-item {
        color: white !important;
    }
    .dropdown-menu {
        background-color: #343a40;
    }
    .dropdown-item:hover {
        background-color: #495057;
    }
</style>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <div>
            <a class="navbar-brand" href="#">Market</a>
            </div>
            <div class="navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown" href="{{ url('item') }}">Товары</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('category') }}">Категории</a></li>
                            <li><a class="dropdown-item" href="{{ url('item') }}">Все товары</a></li>
                            <li><a class="dropdown-item" href="{{ url('item/create') }}">Добавить товар</a></li>
                            <li><a class="dropdown-item" href="{{ url('cart') }}">Корзина</a></li>
                        </ul>
                    </li>
                </ul>
                @if (!Auth::user())
                <form class="d-flex" method="post" action="{{ url('auth') }}">
                    @csrf
                    <input class="form-control me-2" type="text" placeholder="Логин" name="email" aria-label="Логин" value="{{ old('email') }}"/>
                    <input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль" value="{{ old('password') }}"/>
                    <button class="btn btn-outline-success" type="submit">Войти</button>
                </form>
                @else
                    <ul class="navbar-nav">
                        <a class="nav-link active" href="{{ url('cart') }}">
                            <i class="fa fa-user" style="font-size:20px; color:white; background: green;"></i>
                            <span>  </span> {{ Auth::user()->name }}
                        </a>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('logout') }}">Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
