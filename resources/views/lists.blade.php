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
                    <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                  </div>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($departments as $dep)
                <tr>
                    <td class="align-middle">{{ $dep->id }}</td>
                    <td class="align-middle">{{ $dep->name_department }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <table class="table table-bordered table_w tableList">
            <thead>
                <tr>
                    <th rowspan="1" class="align-middle">№</th>
                    <th colspan="1" class="align-middle">Исполнитель</th>
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
                    <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                  </div>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($performers as $per)
                <tr>
                    <td class="align-middle">{{ $per->id }}</td>
                    <td class="align-middle">{{ $per->FIO }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <table class="table table-bordered table_w tableList">
            <thead>
                <tr>
                    <th rowspan="1" class="align-middle">№</th>
                    <th colspan="1" class="align-middle">Наименование оборудования</th>
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
                    <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                  </div>
                </th>
              </tr>
              </form>
            </tfoot>
            <tbody>
              @foreach($equipment as $eq)
                <tr>
                    <td class="align-middle">{{ $eq->id }}</td>
                    <td class="align-middle">{{ $eq->name }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
