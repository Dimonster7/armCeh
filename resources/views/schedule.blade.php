@extends('layouts.base')

@section('title', 'Расписание работы ресурсов')

@section('content')

        <div class="main">
            <div class="wrap_table">
              <form class="" action="" method="get">

                <div class="filter">
                    <div class="title_items">
                        <p class="title_filter">Имя заказа</p>
                        <p class="title_filter">Шифр ДСЕ</p>
                        <p class="title_filter">Шифр</p>
                        <p class="title_filter">Количество ДСЕ в партии</p>
                        <p class="title_filter">Наименование станка</p>
                        <p class="title_filter">Вид спецификации</p>
                        <p class="title_filter">Номер операции</p>
                        <p class="title_filter">Начало операции</p>
                        <p class="title_filter">Окончание операции</p>
                    </div>
                    <div class="schedule_items">
                        <div class="schedule_item1">
                            <div class="name_schedule">
                                <input type="text" placeholder="Ведите имя" name="order_name">
                            </div>
                        </div>

                        <div class="schedule_item2">
                            <div class="code_schedule">
                                <div class="code_order">
                                    <input type="text" placeholder="Ведите шифр ДСЕ" name="cipher_dse">
                                </div>
                            </div>
                        </div>

                        <div class="schedule_item3">
                            <div class="code_schedule">
                                <div class="code_order">
                                    <input type="text" placeholder="Ведите шифр" name="cipher">
                                </div>
                            </div>
                        </div>

                        <div class="schedule_item4">
                            <div class="code_schedule2">
                                <input type="text" placeholder="Введите значение" name="count_dse1">
                            </div>
                            <div class="sort_code">
                                <select name="count_dse2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="schedule_item5">
                            <div class="count_schedule">
                                <input type="text" placeholder="Введите наименование" name="name_of_machine">
                            </div>
                        </div>

                        <div class="schedule_item6">
                            <div class="spec_schedule">
                                 <select name="type_of_specification" id=""> <!--спецификации  -->
                                    <option value="">Выбрать</option>
                                    <option value="Головная">Головная</option>
                                    <option value="Заимствованная">Заимствованная</option>
                                </select>
                            </div>
                        </div>

                        <div class="schedule_item7">
                            <div class="type_spec_schedule">
                                <input type="text" placeholder="Введите номер" name="operation_number1">
                            </div>
                            <div class="sort_order_comp">
                                <select name="operation_number2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="schedule_item8">
                            <div class="start_op">
                                <input type="text" placeholder="__.__.__" name="operation_start_dateTime1">
                            </div>
                            <div class="sort_order_comp">
                                <select name="operation_start_dateTime2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="schedule_item9">
                            <div class="end_op">
                                <input type="text" placeholder="__.__.__" name="operation_end_dateTime1">
                            </div>
                            <div class="sort_order_comp">
                                <select name="operation_end_dateTime2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn_schedule_group">
                    <div class="btn_filters_group">
                        <button class="show_filter" type="submit" name="show">Показать</button>
                        <button class="reset_filter" type="submit" name="reset">Сбросить</button>
                    </div>
                </div>
                </form>
                <div class="btn_in_exls">
                    <a href="{{ route('export', $session_id) }}"><button class="up_exls">Выгрузить в Excel</button></a>
                </div>



                <div class="table_schedule">
                    <table class="table">
                        <tr>
                            <th rowspan="1" class="first name_order len">Имя заказа</th>
                            <th colspan="1" class="code_dse len">Шифр ДСЕ</th>
                            <th rowspan="1" class="code len">Шифр</th>
                            <th rowspan="1" class="count_dse len">Количество ДСЕ в партии</th>
                            <th rowspan="1" class="name_st len">Наименование станка</th>
                            <th rowspan="1" class="spec len">Вид спецификации</th>
                            <th rowspan="1" class="spec len">Номер операции</th>
                            <th rowspan="1" class="start_sc len">Начало операции</th>
                            <th rowspan="1" class="end_sc len">Окончание операции</th>
                        </tr>
                        @foreach($data as $elem)
                        <tr>
                            <td class="first">{{$elem->order_name}}</td>
                            <td class="first">{{$elem->cipher_dse}}</td>
                            <td class="first">{{$elem->cipher}}</td>
                            <td class="first">{{$elem->count_dse}}</td>
                            <td class="first">{{$elem->name_of_machine}}</td>
                            <td class="first">{{$elem->type_of_specification}}</td>
                            <td class="first">{{$elem->operation_number}}</td>
                            <td class="first">{{$elem->operation_start_dateTime}}</td>
                            <td class="first">{{$elem->operation_end_dateTime}}</td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td class="first plan1">Тип плана</td>
                            <td class="first plan2">Начало плана</td>
                            <td class="first plan3">Окончание плана</td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="first">1</td>
                            <td class="first">Год</td>
                            <td class="first">25.06.2020</td>
                            <td class="first">25.06.21</td>
                            <td class="first">Без учета персонала</td>
                            <td class="first">640</td>
                            <td class="first">100%</td>
                            <td class="first">
                                <div class="btn_act">
                                    <button class="accept">Принять</button>
                                    <button class="delete">Удалить</button>
                                </div>
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>

@endsection
