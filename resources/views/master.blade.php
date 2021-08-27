@extends('layouts.base')

@section('title', 'Мастер')

@section('content')

        <div class="main">
            <div class="wrap">
                <div class="podr">
                    <p>Подразделения для отображения заданий:</p>
                    <select class="podr_master" name="" id="">
                        <option value="">Выбрать</option>
                        @foreach($data as $elem)
                        <option value="{{ $elem->department }}">{{ $elem->department }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="nav_master">
                    <div class="wrap_nav_master">
                        <div class="title_master">
                            <p class="p_track p_master">Задания в подразделении</p>
                        </div>
                        <ul class="navbar-nav nav_ul_track">
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('perform') ? 'actived' : ''}}" href="{{ route('perform') }}">Требуется выполнить</a>
                            </li>
                            <li class="nav-item nav_hover">
                                <a class="nav-link link_track {{Route::is('masterCompleted') ? 'actived' : ''}}" href="{{ route('masterCompleted') }}">Завершенные</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filters_master">
                  <form class="" action="" method="get">
                    <div class="wrap_master">
                        <div class="checkbox_master">
                            <div class="item_checkbox">
                                <input class="ch_master1" type="checkbox">
                                <p>Все задания</p>
                            </div>

                            <div class="item_checkbox">
                                <input class="ch_master" type="checkbox">
                                <p>Задания без назначенных исполнителей</p>
                            </div>

                            <div class="item_checkbox">
                                <input class="ch_master" type="checkbox">
                                <p>Задания без назначенного оборудование</p>
                            </div>
                        </div>
                    </div>

                    <div class="wrap_master">
                        <div class="inputs_master1">
                            <div class="in_filter_i1">
                                <div class="title_filter_i1">
                                    <p class="title_master_i">Наименование заказа</p>
                                </div>
                                <div class="item_in1">
                                    <input class="filter_input" type="text" placeholder="Введите наименование" name="order_name">
                                </div>
                            </div>

                            <div class="in_filter_i2">
                                <div class="title_filter_i2">
                                    <p class="title_master_i">Наименование ДСЕ</p>
                                </div>
                                <div class="item_in1">
                                    <input class="filter_input" type="text" placeholder="Введите ДСЕ" name="name_dse">
                                </div>
                            </div>

                            <div class="in_filter_i3">
                                <div class="title_filter_i3">
                                    <p class="title_master_i">Размер партии</p>
                                </div>
                                <div class="item_in1">
                                    <input class="filter_input" type="text" placeholder="Введите значение" name="batch_count1">
                                </div>
                                <div class="sort_order">
                                    <select name="batch_count2" id="">
                                        <option value="DESC">По убыванию</option>
                                        <option value="ASC">По возрастанию</option>
                                    </select>
                                </div>
                            </div>

                            <div class="in_filter_i4">
                                <div class="title_filter_i4">
                                    <p class="title_master_i">Наименование операции</p>
                                </div>
                                <div class="item_in1">
                                    <input class="filter_input" type="text" placeholder="Введите наименование" name="operation_name">
                                </div>
                            </div>

                            <div class="in_filter_i5">
                                <div class="title_filter_i5">
                                    <p class="title_master_i">Исполнители</p>
                                </div>
                                <div class="item_in1">
                                    <input class="filter_input" type="text" placeholder="Введите исполнителя" name="performer">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="inputs_master2">
                        <div class="in_filter_i1">
                            <div class="title_filter_i1">
                                <p class="title_master_i">Маршрутный лист</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите маршрутный лист" name="route_list">
                            </div>
                        </div>

                        <div class="in_filter_i2">
                            <div class="title_filter_i2">
                                <p class="title_master_i">Наименование станка</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите наименование" name="name_of_machine">
                            </div>
                        </div>

                        <div class="in_filter_i3">
                            <div class="title_filter_i3">
                                <p class="title_master_i">Прогресс выполнения</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите прогресс, %" name="progress1">
                            </div>
                            <div class="sort_order">
                                <select name="progress2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="in_filter_i4">
                            <div class="title_filter_i4">
                                <p class="title_master_i">Номер операции</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите номер" name="operation_number1">
                            </div>
                            <div class="sort_order">
                                <select name="operation_number2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="in_filter_i5">
                            <div class="title_filter_i5">
                                <p class="title_master_i">Оборудование</p>
                            </div>
                            <div class="item_in1">
                                <input class="filter_input" type="text" placeholder="Введите оборудование" name="equipment">
                            </div>
                        </div>
                    </div>

                    <div class="inputs_master2">
                        <div class="btn_filters_group">
                            <button class="show_filter" type="submit" name="show">Показать</button>
                            <button class="reset_filter" type="submit" name="reset">Сбросить</button>
                        </div>
                    </div>
                  </form>
                </div>

                <div class="table_master">
                    <table class="table">
                        <tr>
                            <th rowspan="1" class="first name_order len2">Имя заказа</th>
                            <th colspan="1" class="code_dse len2">Маршрутный лист</th>
                            <th rowspan="1" class="code len2">Наимнование станка</th>
                            <th rowspan="1" class="count_dse len2">Шифр ДСЕ</th>
                            <th rowspan="1" class="name_st len2">Номер операции</th>
                            <th rowspan="1" class="name_st len2">Наименование операции</th>
                            <th rowspan="1" class="name_st len2">Размер партии</th>
                            <th rowspan="1" class="name_st len2">Прогресс выполения, %</th>
                            <th rowspan="1" class="name_st len2">Исполнители</th>
                            <th rowspan="1" class="name_st len2">Оборудование</th>
                        </tr>
                        @foreach($data as $elem)
                        <tr>
                            <td rowspan="1" class="first tb_i">{{ $elem->order_name }}</td>
                            <td class="first tb_i">{{ $elem->route_list }}</td>
                            <td class="first tb_i">{{ $elem->name_of_machine }}</td>
                            <td class="first tb_i">{{ $elem->cipher_dse }}</td>
                            <td class="first tb_i">{{ $elem->operation_number }}</td>
                            <td class="first tb_i">{{ $elem->operation_name }}</td>
                            <td class="first tb_i">{{ $elem->batch_count }}</td>
                            <td class="first tb_i">{{ $elem->progress }}</td>
                            <td class="first tb_i">{{ $elem->performer }}</td>
                            <td class="first tb_i">{{ $elem->equipment }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

@endsection
