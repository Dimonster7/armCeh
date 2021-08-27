@extends('layouts.base')

@section('title', 'Приложения')

@section('content')

        <div class="main">
            <div class="wrap">
                <div class="app_plan">
                    <div class="wrap_app">
                      <a href="{{ route('inProduction') }}">
                        <div class="head_app">
                            <h2>Приложение: "Плановик"</h2>
                        </div>
                        <div class="text_app">
                            <p>Запуск и контроль маршрутных листов</p>
                        </div>
                      </a>
                    </div>
                </div>

                <div class="app_plan">
                    <div class="wrap_app">
                      <a href="{{ route('perform') }}">
                        <div class="head_app">
                            <h2>Приложение: "Мастер"</h2>
                        </div>
                        <div class="text_app">
                            <p>Управление исполнением работ по маршрутным листам</p>
                        </div>
                      </a>
                    </div>
                </div>

                <div class="app_plan">
                    <div class="wrap_app">
                      <a href="{{ route('worker') }}">
                        <div class="head_app">
                            <h2>Приложение: "Рабочий"</h2>
                        </div>
                        <div class="text_app">
                            <p>исполнение работ по маршрутным листам</p>
                        </div>
                      </a>
                    </div>
                </div>
            </div>
        </div>

@endsection
