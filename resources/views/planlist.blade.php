@extends('layouts.base')

@section('title', 'Плановик')

@section('content')

        <div class="content">
            <div class="container">
                <div class="card">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <h5 class="card-header">Маршрутные листы</h5>
                        <a class="nav-link link_track {{Route::is('inProduction') ? 'actived' : ''}}" href="{{ route('inProduction', $session_id) }}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">В производстве</button></a>
                        <a class="nav-link link_track {{Route::is('toLaunch') ? 'actived' : ''}}" href="{{ route('toLaunch', $session_id) }}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">На запуск</button></a>
                        <a class="nav-link link_track {{Route::is('suspended') ? 'actived' : ''}}" href="{{ route('suspended', $session_id) }}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">Приостановленные</button></a>
                        <a class="nav-link link_track {{Route::is('plannerCompleted') ? 'actived' : ''}}" href="{{ route('plannerCompleted', $session_id) }}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">Завершенные</button></a>
                    </div>
                    <div class="card-body">
                        <div class="col">
                          <form class="" action="" method="get">
                            @csrf
                            <div class="row row_filter">
                                <div class="item">
                                    <p class="title_master_i">Наименование партии</p>
                                    <input class="filter_input form-control" type="text" placeholder="Введите наименование" name="batch">
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Маршрутный лист</p>
                                    <input class="filter_input form-control" type="text" placeholder="Маршрутный лист" name="route_list">
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Шифр</p>
                                    <input class="filter_input_s form-control" type="text" placeholder="Введите шифр" name="cipher">
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Размер партии</p>
                                    <input class="filter_input form-control" type="text" placeholder="Введите значение" name="batch_count1">

                                    <div class="btn-group btn_group_fil">
                                        <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="batch_count2" value="ASC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-outline-secondary btn_del_r" name="batch_count2" value="DESC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Заказ</p>
                                    <input class="filter_input form-control" type="text" placeholder="Введите наименование" name="order">
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Дата начала работ</p>
                                    <input class="filter_input form-control" type="text" placeholder="__.__.__" name="start_dateTime1">

                                    <div class="btn-group btn_group_fil">
                                        <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="start_dateTime2" value="ASC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-outline-secondary btn_del_r" name="start_dateTime2" value="DESC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="item">
                                    <p class="title_master_i">Дата окончания работ</p>
                                    <input class="filter_input form-control" type="text" placeholder="__.__.__" name="end_dateTime1">

                                    <div class="btn-group btn_group_fil">
                                        <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="end_dateTime2" value="ASC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-outline-secondary btn_del_r" name="end_dateTime2" value="DESC">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="btn_group_sch up_fil">
                              <button type="submit" class="btn btn-primary">Показать</button>
                              <button type="submit" class="btn btn-danger">Сбросить</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                @foreach($data as $elem)
                <div class="card card_item">
                    <div class="card-body">
                        <div class="col">
                            <div class="headers_list">
                                <h3 class="h_plan_list">{{ $elem->batch }}</h3>

                            </div>
                            <div class="info_plan_list">
                                <div class="data_plan_list">
                                    <p class="p_plan_list">Маршрутный лист: {{ $elem->route_list }}</p>
                                    <p class="p_plan_list">Шифр: {{ $elem->cipher }}</p>
                                    <p class="p_plan_list">Размер партии: {{ $elem->batch_count }}</p>
                                    <p class="p_plan_list">Заказ: {{ $elem->order }}</p>
                                </div>
                                <div class="act_plan_list">
                                    <div class="p_list">
                                        <p class="p_plan_list">Плановая дата начала работ над партией:
                                            {{ $elem->start_dateTime }}</p>
                                        <p class="p_plan_list">Плановая дата окончания работ над партией:
                                            {{ $elem->end_dateTime }}</p>
                                    </div>
                                    <div class="btn_list">
                                        <form class="" action="{{ Route::is('toLaunch') ? route('startToLaunch', ['session' => $session_id, 'batch' => $elem->id]) : route('startSuspended', ['session' => $session_id, 'batch' => $elem->id]) }}" method="post">
                                          @csrf
                                          <a href="{{ Route::is('toLaunch') ? route('startToLaunch', ['session' => $session_id, 'batch' => $elem->id]) : route('startSuspended', ['session' => $session_id, 'batch' => $elem->id]) }}" class=" {{Route::is('inProduction') ? 'hidden' : ''}} {{Route::is('plannerCompleted') ? 'hidden' : ''}}"><button class="btn btn-success">Запустить</button></a>
                                        </form>
                                        <form class="" action="{{ route('pause', ['session' => $session_id, 'batch' => $elem->id]) }}" method="post">
                                          @csrf
                                          <a href="{{ route('pause', ['session' => $session_id, 'batch' => $elem->id]) }}" class="{{Route::is('plannerCompleted') ? 'hidden' : ''}}  {{Route::is('toLaunch') ? 'hidden' : ''}} {{Route::is('suspended') ? 'hidden' : ''}}"><button class="btn btn-warning">Приостановить</button></a>
                                        </form>
                                        <form class="" action="{{ Route::is('inProduction') ? route('finishProduction', ['session' => $session_id, 'batch' => $elem->id]) : route('finishSuspended', ['session' => $session_id, 'batch' => $elem->id]) }}" method="post">
                                          @csrf
                                          <a href="{{ Route::is('inProduction') ? route('finishProduction', ['session' => $session_id, 'batch' => $elem->id]) : route('finishSuspended', ['session' => $session_id, 'batch' => $elem->id]) }}" class="{{Route::is('plannerCompleted') ? 'hidden' : ''}}  {{Route::is('toLaunch') ? 'hidden' : ''}}"><button class="btn btn-danger">Завершить</button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $data->links() }}
            </div>
        </div>

@endsection
