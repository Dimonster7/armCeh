@extends('layouts.base')

@section('title', 'Управление сессиями')

@section('content')
        <div class="main">
            <div class="wrap_table">
                <div class="filter">
                  <form class="" action="" method="get">
                    <div class="title_items">
                        <p class="title_filter">Номер заказа</p>
                        <p class="title_filter">Тип плана</p>
                        <p class="title_filter">Начало плана</p>
                        <p class="title_filter">Окончание плана</p>
                        <p class="title_filter">Информация по <br> профессиям</p>
                        <p class="title_filter">Длительность <br> выполнения заказов, ч</p>
                    </div>
                    <div class="filter_items">
                        <div class="item1">

                            <div class="num_order">
                                <input class="input_main" type="text" placeholder="Ведите номер" name="order_number1">
                            </div>
                            <div class="sort_order">
                                <select name="order_number2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="item2">
                            <div class="type_plan">

                                <select name="type_of_plan" id="">
                                    <option value="">Выбрать</option>
                                    <option value="Год">Год</option>
                                    <option value="Квартал">Квартал</option>
                                    <option value="Месяц">Месяц</option>
                                </select>
                            </div>
                        </div>

                        <div class="item3">

                            <div class="plan_start">
                                <input class="input_main" type="text" placeholder="__.__.__" name="start_of_plan1">
                            </div>
                            <div class="sort_plan_start">
                                <select name="start_of_plan2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="item4">

                            <div class="plan_end">
                                <input class="input_main" type="text" placeholder="__.__.__" name="end_of_plan1">
                            </div>
                            <div class="sort_plan_end">
                                <select name="end_of_plan2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="item5">

                            <div class="info_prof">
                                <input class="input_main" type="text" name="information_on_professions">
                            </div>
                        </div>

                        <div class="item6">

                            <div class="order_comp">
                                <input class="input_main" type="text" placeholder="Введите значение" name="duration_of_execution1">
                            </div>
                            <div class="sort_order_comp">
                                <select name="duration_of_execution2" id="">
                                    <option value="DESC">По убыванию</option>
                                    <option value="ASC">По возрастанию</option>
                                </select>
                            </div>
                        </div>

                        <div class="item7">
                            <div class="btn_filters_group">
                                <button class="show_filter" type="submit" name="show">Показать</button>
                                <button class="reset_filter" type="submit" name="reset">Сбросить</button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>

                <div class="table_orders">
                    <table class="table">
                        <tr>
                            <th rowspan="2" class="first num len2">Номер заказа</th>
                            <th colspan="3" class="plan len2">План</th>
                            <th rowspan="2" class="info_prof len2">Информация по профессиям</th>
                            <th rowspan="2" class="time_order len2">Длительность исполнения всех заказов, ч</th>
                            <th rowspan="2" class="progress len2">Прогресс выполнения, %</th>
                            <th rowspan="2" class="action len2">Действие</th>
                        </tr>
                        <tr>
                            <td class="first plan1">Тип плана</td>
                            <td class="first plan2">Начало плана</td>
                            <td class="first plan3">Окончание плана</td>
                        </tr>
                        @foreach($data as $elem)

                        <tr>
                            <td class="first"><a href="{{ route('session', $elem->id) }}">{{$elem->order_number}}</a></td>
                            <td class="first">{{$elem->type_of_plan}}</td>
                            <td class="first">{{$elem->start_of_plan}}</td>
                            <td class="first">{{$elem->end_of_plan}}</td>
                            <td class="first">{{$elem->information_on_professions}}</td>
                            <td class="first">{{$elem->duration_of_execution}}</td>
                            <td class="first">{{$elem->progress}}</td>
                            <td class="first">
                                <div class="btn_act">
                                    <a href="{{ route('applications') }}"><button class="accept">Принять</button></a>
                                    <a href="{{ route('deleteSession', $elem->id) }}"><button class="delete">Удалить</button></a>
                                </div>
                            </td>
                        </tr>

                      @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection
