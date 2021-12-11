@extends('layouts.base')

@section('title', 'Добавить списки')

@section('content')

<div class="content">
    <div class="container-fluid">
        <table class="table table-bordered table_w tableList">
            <thead>
                <tr>
                    <th rowspan="1" class="align-middle">№</th>
                    <th colspan="1" class="align-middle">Наименование подразделения</th>
                    <th colspan="1" class="align-middle">Действие</th>
                </tr>
            </thead>
            <tfoot>
              <form action="{{ route('addListDep') }}" method="post">
                @csrf
              <tr>
                <th></th>
                <th>
                  <div class="form-floating item_filters">
                    <input type="text" autocomplete="on" class="form-control" name="name_department" value="" placeholder="подразделение">
                  </div>
                </th>
                <th>
                  <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($departments as $dep)
                <tr>
                    <td class="align-middle">{{ $dep->id }}</td>
                    <td class="align-middle">{{ $dep->name_department }}</td>
                    <td class="align-middle">
                      <form action="{{ route('delDep', $dep->id) }}" method="post">
                        @csrf
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
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <table class="table table-bordered table_w tableList">
            <thead>
                <tr>
                    <th rowspan="1" class="align-middle">№</th>
                    <th colspan="1" class="align-middle">Исполнитель</th>
                    <th colspan="1" class="align-middle">Действие</th>
                </tr>
            </thead>
            <tfoot>
              <form action="{{ route('addListPer') }}" method="post">
                @csrf
              <tr>
                <th></th>
                <th>
                  <div class="form-floating item_filters">
                    <input type="text" autocomplete="on" class="form-control" name="FIO" value="" placeholder="Фамилия Имя">
                  </div>
                </th>
                <th>
                  <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($performers as $per)
                <tr>
                    <td class="align-middle">{{ $per->id }}</td>
                    <td class="align-middle">{{ $per->FIO }}</td>
                    <td class="align-middle">
                      <form action="{{ route('delPer', $per->id) }}" method="post">
                        @csrf
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
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <table class="table table-bordered table_w tableList">
            <thead>
                <tr>
                    <th rowspan="1" class="align-middle">№</th>
                    <th colspan="1" class="align-middle">Наименование оборудования</th>
                    <th colspan="1" class="align-middle">Действие</th>
                </tr>
            </thead>
            <tfoot>
              <form action="{{ route('addListEq') }}" method="post">
                @csrf
              <tr>
                <th></th>
                <th>
                  <div class="form-floating item_filters">
                    <input type="text" autocomplete="on" class="form-control" name="name_eq" value="" placeholder="Оборудование">
                  </div>
                </th>
                <th>
                  <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($equipment as $eq)
                <tr>
                    <td class="align-middle">{{ $eq->id }}</td>
                    <td class="align-middle">{{ $eq->name }}</td>
                    <td class="align-middle">
                      <form action="{{ route('delEq', $eq->id) }}" method="post">
                        @csrf
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
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
