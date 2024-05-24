<header>
    <nav class = "navbar navbar-expand-md navbar-dark fixed-top"></nav>
        <div class = "container-fluid">
            <a class = "navbar-brand" href="#">Laravel Project</a>
            <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarCollapse"
                aria-controls = "navbarCollapse" aria-expanded = "false" aria-label = "Toggle navigation" style="background-color: gray;">
                <span class = "navbar-toggler-icon"></span>
            </button>
            <div class = "collapse navbar-collapse" id = "navbarCollapse">
                <ul class = "navbar-nav me-auto mb-2 mb-mb-0">
                    <li class = "nav-item dropdown">
                        <a class = "nav-link dropdown-toggle active" aria-current = "page" data-bs-toggle = "dropdown" href = {{ url('item') }}>Товары</a>
                        <ul class = "dropdown-menu">
                            <li><a class = "dropdown-item" href = {{ url('item') }}>Все товары</a></li>
                            <li><a class = "dropdown-item" href = {{ url('item/create') }}>Добавить товар</a></li>
                            <li><a class = "dropdown-item" href = {{ url('category') }}>Категории</a></li>
                        </ul>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#">Заказы</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link disabled" aria-disabled = "true">Покупатели</a>
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
                    <ul class = "navbar-nav">
                        <a class = "nav-link active" href = "#">
                            <i class = "fa fa-user" style = "font-size:20px; color:white; background: green;"></i>
                            <span>  </span> {{Auth::user()->name}}
                        </a>
                        <a class = "btn btn-outline-success my-2 my-sm-0" href = "{{ url('logout') }}">Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
