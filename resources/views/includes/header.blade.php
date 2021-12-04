<nav class="navbar navbar-light bg-light bg_shodow">
        <div class="container">
            <!-- <a class="navbar-brand">Navbar</a> -->
            <div class="logo">
                <a class="logo_link" href="{{ route('sessions') }}"><img class="img_head" src="/img/armdl_logo.png" alt="armdl_logo"></a>
            </div>
            <form class="d-flex">
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button> -->
                <ul class="navbar_nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('addList') }}">Добавить списки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" target="_blank" href="{{ route('user.registration') }}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('user.login') }}">Вход</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
