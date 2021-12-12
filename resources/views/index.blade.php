@extends('layouts.base')

@section('title', 'Управление сессиями')

@section('content')
        <div class="content">
        <div class="container-fluid">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Номер заказа</th>
                        <th colspan="3">План</th>
                        <th rowspan="2" class="align-middle">Информация по профессиям</th>
                        <th rowspan="2" class="align-middle">Длительность исполнения всех заказов, ч</th>
                        <th rowspan="2" class="align-middle">Прогресс выполнения, %</th>
                        <th rowspan="2" class="align-middle">Действие</th>
                    </tr>
                    <tr>
                        <th>Тип плана</th>
                        <th>Начало плана</th>
                        <th>Окончание плана</th>
                    </tr>
                </thead>
                @if($role == "Администратор")
                <tfoot>
                  <form action="{{ route('addSession') }}" method="post">
                    @csrf
                  <tr class="table-footer">
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_order_number" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_type_of_plan" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_start_of_plan" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_end_of_plan" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_information_on_professions" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_duration_of_execution" value="" required>
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_progress" value="" required>
                    </th>
                    <th>
                      <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                    </th>
                  </tr>
                  </form>
                </tfoot>
                @endif
                <tbody>
                  <form class="" action="" method="get">

                    <tr>
                        <td>
                            <div class="form-floating item_filters">
                                <input type="" class="form-control" id="floatingPassword" placeholder="Номер" name="order_number1" value=""><!--old('order_number1')-->
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="order_number2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </botton>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="order_number2" value="DESC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type_of_plan">
                                <option disabled selected>Тип плана</option>
                                <option value="Год">Год</option>
                                <option value="Квартал">Квартал</option>
                                <option value="Месяц">Месяц</option>
                            </select>
                        </td>
                        <td>
                            <div class="wrap_sort">
                                <input type="" class="form-control" id="floatingPassword" placeholder="Введите дату" name="start_of_plan1">
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="start_of_plan2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="start_of_plan2" value="DESC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="wrap_sort">
                                <input type="" class="form-control" id="floatingPassword" placeholder="Введите дату" name="end_of_plan1">
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="end_of_plan2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="end_of_plan2" value="DESC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="" class="form-control" id="floatingPassword"  name="information_on_professions">
                        </td>
                        <td>
                            <div class="wrap_sort">
                                <input type="" class="form-control" id="floatingPassword" placeholder="Введите число" name="duration_of_execution1">
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="duration_of_execution2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="duration_of_execution2" value="DESC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-floating item_filters">
                                <input type="" class="form-control" id="floatingPassword" placeholder="Прогресс" name="progress1">
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="progress2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </botton>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="progress2" value="DESC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="btn-group btn_group_fil">
                                <button type="submit" class="btn btn-outline-secondary btn_acc_gr">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                                <!--</form>-->
                              <!--  <form class="" action="/name" method="post">
                                  @csrf -->
                                  <button type="submit" class="btn btn-outline-secondary btn_del_r">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                          <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                      </svg>
                                  </button>
                                <!--</form>-->
                            </div>
                        </td>
                    </tr>
                    </form>


                    @foreach($data as $elem)
                    <tr>
                        <td class="align-middle">{{$elem->order_number}}</td>
                        <td class="align-middle">{{$elem->type_of_plan}}</td>
                        <td class="align-middle">{{$elem->start_of_plan}}</td>
                        <td class="align-middle">{{$elem->end_of_plan}}</td>
                        <td class="align-middle">{{$elem->information_on_professions}}</td>
                        <td class="align-middle">{{$elem->duration_of_execution}}</td>
                        <td class="align-middle">{{$elem->progress}}</td>
                        <td class="align-middle">
                            <div class="btn_act">
                                <div class="btn-group btn_group_fil">
                                  <form action="{{ route('applications', $elem->id) }}" method="get">
                                    @csrf
                                    <a href="{{ route('applications', $elem->id) }}">
                                      <button class="btn btn-outline-secondary btn_acc_gr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                          </svg>
                                        </button>
                                      </a>
                                    </form>
                                    <form action="{{ route('deleteSession', $elem->id) }}" method="post">
                                      @csrf
                                    <a href="{{ route('deleteSession', $elem->id) }}">
                                      <button class="btn btn-outline-secondary btn_del_r">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                      </button>
                                    </a>
                                    </form>
                                    <a href="{{ route('session', $elem->id) }}">
                                      <button type="button" class="btn btn-outline-secondary btn_inf">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                              <path d="m10.277 5.433-4.031.505-.145.67.794.145c.516.123.619.309.505.824L6.101 13.68c-.34 1.578.186 2.32 1.423 2.32.959 0 2.072-.443 2.577-1.052l.155-.732c-.35.31-.866.434-1.206.434-.485 0-.66-.34-.536-.939l1.763-8.278zm.122-3.673a1.76 1.76 0 1 1-3.52 0 1.76 1.76 0 0 1 3.52 0z"/>
                                          </svg>
                                      </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>

@endsection
