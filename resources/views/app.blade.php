@extends('layouts.base')

@section('title', 'Приложения')

@section('content')

        <div class="content">
                <div class="container">
                    <div class="card">
                        <h5 class="card-header">Приложение: "Плановик"</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Специальный заголовок</h5> -->
                            <p class="card-text">Запуск и контроль маршрутных листов</p>
                            <a href="{{ route('inProduction', $session_id) }}" class="btn btn-primary">Перейти в "Плановик"</a>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header">Приложение: "Мастер"</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Специальный заголовок</h5> -->
                            <p class="card-text">Управление исполнением работ по маршрутным листам</p>
                            <a href="{{ route('perform', $session_id) }}" class="btn btn-primary">Перейти в "Мастер"</a>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header">Приложение: "Рабочий"</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Специальный заголовок</h5> -->
                            <p class="card-text">Исполнение работ по маршрутным листам</p>
                            <a href="{{ route('worker', $session_id) }}" class="btn btn-primary">Перейти в "Рабочий"</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection
