<div class="header">
    <div class="wrap">
        <div class="nav">
            <div class="logo">
                <a class="logo_link" href="{{ route('sessions') }}"><img src="/img/armdl_logo.png" alt="armdl_logo"></a>
            </div>
            <div class="btn_group">
                <!-- <a class="reg" href="#">Регистрация</a>
            <a class="log" href="#">Вход</a> -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" target="_blank" href="{{ route('user.registration') }}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('user.login') }}">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
