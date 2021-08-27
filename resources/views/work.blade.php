@extends('layouts.base')

@section('title', 'Рабочий')

@section('content')

        <div class="main">
            <div class="wrap_table">
                <div class="table_schedule">
                    <table class="table">
                        <tr>
                            <th rowspan="1" class="first name_order len2">Клиентский <br> идентификатор <br> маршрутного
                                листа</th>
                            <th colspan="1" class="code_dse len2">Имя заказа</th>
                            <th rowspan="1" class="code len2">Наименование ДСЕ</th>
                            <th rowspan="1" class="count_dse len2">Шифр ДСЕ</th>
                            <th rowspan="1" class="name_st len2">Шифр</th>
                            <th rowspan="1" class="spec len2">Размер партии</th>
                            <th rowspan="1" class="spec len2">Номер операции</th>
                            <th rowspan="1" class="start_sc len2">Наименование операции</th>
                            <th rowspan="1" class="end_sc len2">Прогресс выполнения, %</th>
                            <th rowspan="1" class="end_sc len2">Исполнители</th>
                            <th rowspan="1" class="end_sc len2">Оборудование</th>
                            <th rowspan="1" class="end_sc len2">Плановые <br> дата и время <br> начала <br> операции</th>
                            <th rowspan="1" class="end_sc len2">Плановые <br> дата и время <br> окончания <br> операции</th>
                        </tr>
                        @foreach($data as $elem)
                        <tr>
                            <td class="first tb_i">{{ $elem->client_id_routelist }}</td>
                            <td class="first tb_i">{{ $elem->order_name }}</td>
                            <td class="first tb_i">{{ $elem->name_dse }}</td>
                            <td class="first tb_i">{{ $elem->cipher_dse }}</td>
                            <td class="first tb_i">{{ $elem->cipher }}</td>
                            <td class="first tb_i">{{ $elem->batch_count }}</td>
                            <td class="first tb_i">{{ $elem->operation_number }}</td>
                            <td class="first tb_i">{{ $elem->operation_name }}</td>
                            <td class="first tb_i">{{ $elem->progress }}</td>
                            <td class="first tb_i">{{ $elem->performer }}</td>
                            <td class="first tb_i">{{ $elem->equipment }}</td>
                            <td class="first tb_i">{{ $elem->start_dateTime }}</td>
                            <td class="first tb_i">{{ $elem->end_dateTime }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

@endsection
