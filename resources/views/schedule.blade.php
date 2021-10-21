@extends('layouts.base')

@section('title', 'Расписание работы ресурсов')

@section('content')
<div class="content">
      <div class="container-fluid">
          <table class="table table-bordered">
              <thead>
                <form class="" action="" method="get">
                @csrf
                  <tr>
                      <th rowspan="1" class="align-middle">Имя заказа</th>
                      <th colspan="1" class="align-middle">Шифр ДСЕ</th>
                      <th rowspan="1" class="align-middle">Шифр</th>
                      <th rowspan="1" class="align-middle">Количество ДСЕ в партии</th>
                      <th rowspan="1" class="align-middle">Наименование станка</th>
                      <th rowspan="1" class="align-middle">Вид спецификации</th>
                      <th rowspan="1" class="align-middle">Номер операции</th>
                      <th rowspan="1" class="align-middle">Начало операции</th>
                      <th rowspan="1" class="align-middle">Окончание операции</th>
                  </tr>
                  <tr>
                      <th rowspan="1" class="align-middle">
                          <input type="" class="form-control" id="floatingPassword" placeholder="Введите имя" name="order_name">
                      </th>
                      <th colspan="1" class="align-middle">
                          <input type="" class="form-control" id="floatingPassword" placeholder="Введите шифр ДСЕ" name="cipher_dse">
                      </th>
                      <th rowspan="1" class="align-middle">
                          <input type="" class="form-control" id="floatingPassword" placeholder="Введите шифр" name="cipher">
                      </th>
                      <th rowspan="1" class="align-middle">
                          <div class="form-floating item_filters">
                              <input type="" class="form-control" id="floatingPassword"
                                  placeholder="Введите значение" name="count_dse1">
                              <div class="btn-group btn_group_fil">
                                  <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="count_dse2" value="ASC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                                  <button type="submit" class="btn btn-outline-secondary btn_del_r" name="count_dse2" value="DESC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </th>
                      <th rowspan="1" class="align-middle">
                          <input type="" class="form-control" id="floatingPassword" placeholder="Наименование" name="name_of_machine">
                      </th>
                      <th rowspan="1" class="align-middle">
                          <select class="form-select" aria-label="Default select example" name="type_of_specification">
                              <option selected disabled>Спецификации</option>
                              <option value="Головная">Головная</option>
                              <option value="Заимствованная">Заимствованная</option>
                          </select>
                      </th>
                      <th rowspan="1" class="align-middle">
                          <div class="form-floating item_filters">
                              <input type="" class="form-control" id="floatingPassword" placeholder="Введите номер" name="operation_number1">
                              <div class="btn-group btn_group_fil">
                                  <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="operation_number2" value="ASC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                                  <button type="submit" class="btn btn-outline-secondary btn_del_r" name="operation_number2" value="DESC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </th>
                      <th rowspan="1" class="align-middle">
                          <div class="form-floating item_filters">
                              <input type="" class="form-control" id="floatingPassword" placeholder="__.__.__" name="operation_start_dateTime1">
                              <div class="btn-group btn_group_fil">
                                  <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="operation_start_dateTime2" value="ASC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                                  <button type="submit" class="btn btn-outline-secondary btn_del_r" name="operation_start_dateTime2" value="DESC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </th>
                      <th rowspan="1" class="align-middle">
                          <div class="form-floating item_filters">
                              <input type="" class="form-control" id="floatingPassword" placeholder="__.__.__" name="operation_end_dateTime1">
                              <div class="btn-group btn_group_fil">
                                  <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="operation_end_dateTime2" value="ASC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                                  <button type="submit" class="btn btn-outline-secondary btn_del_r" name="operation_end_dateTime2" value="DESC">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                          <path
                                              d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </th>
                  </tr>
                  <tr>
                      <th colspan="9" class="align-middle">
                          <div class="btn_group_sch">
                              <button type="submit" class="btn btn-primary" name="show">Показать</button>
                              <button type="submit" class="btn btn-danger" name="reset">Сбросить</button>
                              <a href="{{ route('export', $session_id) }}" class="download_excel">
                                <button type="button" class="btn btn-success">Выгрузить в Excel</button>
                              </a>
                          </div>
                      </th>
                  </tr>
                </form>
              </thead>
              <tbody>
                @foreach($data as $elem)
                  <tr>
                      <td class="align-middle">{{$elem->order_name}}</td>
                      <td class="align-middle">{{$elem->cipher_dse}}</td>
                      <td class="align-middle">{{$elem->cipher}}</td>
                      <td class="align-middle">{{$elem->count_dse}}</td>
                      <td class="align-middle">{{$elem->name_of_machine}}</td>
                      <td class="align-middle">{{$elem->type_of_specification}}</td>
                      <td class="align-middle">{{$elem->operation_number}}</td>
                      <td class="align-middle">{{$elem->operation_start_dateTime}}</td>
                      <td class="align-middle">{{$elem->operation_end_dateTime}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          {{ $data->links() }}
      </div>
  </div>
@endsection
