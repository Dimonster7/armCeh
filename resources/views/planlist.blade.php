@extends('layouts.base')

@section('title', 'Плановик')

@section('content')

        <div class="main">
            <div class="wrap">
                <div class="nav_master">
                    <div class="wrap_nav_master">
                        <div class="title_master">
                            <p class="p_track p_master">Маршрутные листы</p>
                        </div>
                        <ul class="navbar-nav nav_ul_track">
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('inProduction') ? 'actived' : ''}}" href="{{ route('inProduction') }}">В производстве</a>
                            </li>
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('toLaunch') ? 'actived' : ''}}" href="{{ route('toLaunch') }}">На запуск</a>
                            </li>
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('suspended') ? 'actived' : ''}}" href="{{ route('suspended') }}">Приостановленные</a>
                            </li>
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('plannerCompleted') ? 'actived' : ''}}" href="{{ route('plannerCompleted') }}">Завершенные</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filters_master filters_planlist">
                  <form class="" action="" method="get">
                    <div class="inputs_planlist">
                        <div class="in_filter_i1">
                            <div class="title_filter_i1">
                                <p class="title_master_i">Наименование партии</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите наименование" name="batch">
                            </div>
                        </div>

                        <div class="in_filter_i2">
                            <div class="title_filter_i2">
                                <p class="title_master_i">Маршрутный лист</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Маршрутный лист" name="route_list">
                            </div>
                        </div>

                        <div class="in_filter_i3">
                            <div class="title_filter_i3">
                                <p class="title_master_i">Шифр</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите шифр" name="cipher">
                            </div>
                        </div>

                        <div class="in_filter_i4">
                            <div class="title_filter_i4">
                                <p class="title_master_i">Размер партии</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите номер" name="batch_count1">
                            </div>
                            <div class="sort_order">
                                <select name="batch_count2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="in_filter_i5">
                            <div class="title_filter_i5">
                                <p class="title_master_i">Заказ</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите наименование" name="order">
                            </div>
                        </div>

                        <div class="in_filter_i6">
                            <div class="title_filter_i6">
                                <p class="title_master_i">Дата начала работ</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="__.__.__" name="start_dateTime1">
                            </div>
                            <div class="sort_order">
                                <select name="start_dateTime2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="in_filter_i6">
                            <div class="title_filter_i6">
                                <p class="title_master_i">Дата окончания работ</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="__.__.__" name="end_dateTime1">
                            </div>
                            <div class="sort_order">
                                <select name="end_dateTime2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="inputs_planlist">
                        <div class="btn_filters_group">
                            <button class="show_filter" type="submit" name="show">Показать</button>
                            <button class="reset_filter" type="submit" name="reset">Сбросить</button>
                        </div>
                    </div>
                  </form>
                </div>

                @foreach($data as $elem)
                <div class="items_plan_list">
                    <div class="item_plan_list1">
                        <div class="wrap_items_list">
                            <div class="headers_list">
                                <h3 class="h_plan_list">{{ $elem->batch }}</h3>
                                <!-- <h3 class="h_plan_list">(У2260.30.08.006А СВЯЗЬ)</h3> -->
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

                                      <!-- <form class="" action="{{ route('finish', $elem->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('finish', $elem->id) }}"><button class="end_list">Завершить</button></a>
                                        <a href="{{ route('pause', $elem->id) }}"><button class="stop_list">Приостановить</button></a>
                                      </form> -->

                                      <form class="" action="{{ route('startToLaunch', $elem->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('startToLaunch', $elem->id) }}" class=" {{Route::is('inProduction') ? 'hidden' : ''}} {{Route::is('plannerCompleted') ? 'hidden' : ''}}"><button class="start_list">Запустить</button></a>
                                      </form>
                                      <form class="" action="{{ route('pause', $elem->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('pause', $elem->id) }}" class="{{Route::is('plannerCompleted') ? 'hidden' : ''}}  {{Route::is('toLaunch') ? 'hidden' : ''}} {{Route::is('suspended') ? 'hidden' : ''}}"><button class="stop_list">Приостановить</button></a>
                                        <form class="" action="{{ route('finish', $elem->id) }}" method="post">
                                          @csrf
                                          <a href="{{ route('finish', $elem->id) }}" class="{{Route::is('plannerCompleted') ? 'hidden' : ''}}  {{Route::is('toLaunch') ? 'hidden' : ''}}"><button class="end_list">Завершить</button></a>
                                        </form>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              <!--  <div class="item_plan_list1">
                    <div class="wrap_items_list">
                        <div class="headers_list">
                            <h3 class="h_plan_list">У2260.30.08.006А СВЯЗЬ_У2260.30.08.006А СВЯЗЬ</h3>
                            <h3 class="h_plan_list">(У2260.30.08.006А СВЯЗЬ)</h3>
                        </div>
                        <div class="info_plan_list">
                            <div class="data_plan_list">
                                <p class="p_plan_list">Маршрутный лист: 7877</p>
                                <p class="p_plan_list">Шифр: 7877</p>
                                <p class="p_plan_list">Размер партии: 4</p>
                                <p class="p_plan_list">Заказ: К1-2</p>
                            </div>
                            <div class="act_plan_list">
                                <div class="p_list">
                                    <p class="p_plan_list">Плановая дата начала работ над партией:
                                        31.07.2020 17:26</p>
                                    <p class="p_plan_list">Плановая дата окончания работ над партией:
                                        31.07.2020 19:26</p>
                                </div>
                                <div class="btn_list">
                                    <button class="end_list">Завершить</button>
                                    <button class="stop_list">Приостановить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

@endsection
