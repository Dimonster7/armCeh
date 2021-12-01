@extends('layouts.base')

@section('title', 'Мастер')

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="podr">
                    <p>Подразделения для отображения заданий:</p>
                <!--    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">   -->
                    <select class="form-select form-select-lg mb-3" name="" id="department" onchange="showTasks()" aria-label=".form-select-lg example">
                        <option selected disabled>Выбрать</option>
                        @foreach($dep as $elem)
                        <option value="{{ $elem->name_department }}">{{ $elem->name_department }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="btn-group h_title" role="group" aria-label="Basic example">
                    <h5 class="card-header">Задания в подразделении</h5>
                    <a href="{{ route('perform', $session_id) }}" class="nav-link link_track {{Route::is('perform') ? 'actived' : ''}}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">Требуется выполнить</button></a>
                    <a href="{{ route('masterCompleted', $session_id) }}" class="nav-link link_track {{Route::is('masterCompleted') ? 'actived' : ''}}"><button type="button" class="btn btn-primary btn-pl" style="box-shadow: none;">Завершенные</button></a>
                </div>
                <div class="col">
                    <div class="checkbox_master">
                      <!--  <div class="item_checkbox">
                            <input class="ch_master" type="checkbox">
                            <p class="title_master_f">Все задания</p>
                        </div>   -->
                        <form class="" action="" method="get">
                          @csrf
                        <!--<div class="item_checkbox">
                            <input class="ch_master" type="checkbox" name="withoutPerformer">
                            <p class="title_master_f">Задания без назначенных исполнителей</p>
                        </div>

                        <div class="item_checkbox">
                            <input class="ch_master" type="checkbox" name="withoutEquipment">
                            <p class="title_master_f">Задания без назначенного оборудования</p>
                        </div>-->
                    </div>
                </div>
              </div>
            <div class="container-fluid">
              <table class="table table-bordered table_m">
                <thead>
                    <tr>
                        <th rowspan="1" class="align-middle">Имя заказа</th>
                        <th colspan="1" class="align-middle">Маршрутный лист</th>
                        <th rowspan="1" class="align-middle">Наимено- <br> вание станка</th>
                        <th rowspan="1" class="align-middle">Наимено- <br> вание ДСЕ</th>
                        <th rowspan="1" class="align-middle">Номер операции</th>
                        <th rowspan="1" class="align-middle">Наимено- <br> вание операции</th>
                        <th rowspan="1" class="align-middle">Размер партии</th>
                        <th rowspan="1" class="align-middle">Прогресс выполнения, %</th>
                        <th rowspan="1" class="align-middle">Исполни- <br> тели</th>
                        <th rowspan="1" class="align-middle">Обору- <br> дование</th>
                        <th rowspan="1" class="align-middle">Действие</th>
                    </tr>
                    <tr>
                        <th rowspan="1" class="align-middle">
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите наименование" name="order_name"  value="">
                        </th>
                        <th colspan="1" class="align-middle">
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите маршрутный лист" name="route_list">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите наименование" name="name_of_machine">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите наименование ДСЕ" name="name_dse">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <div class="form-floating item_filters">
                                <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите номер" name="operation_number1">
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
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите наименование" name="operation_name">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <div class="form-floating item_filters">
                                <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите значение" name="batch_count1">
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
                        </th>
                        <th rowspan="1" class="align-middle">
                            <div class="form-floating item_filters">
                                <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите прогресс" name="progress1">
                                <div class="btn-group btn_group_fil">
                                    <button type="submit" class="btn btn-outline-secondary btn_acc_gr" name="progress2" value="ASC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </button>
                                    <button type="submit" class="btn btn-outline-secondary btn_del_r" name="progress2" value="DESC">
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
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите исполнителя" name="performer">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <input type="" class="form-control" id="floatingPassword"
                                    placeholder="Введите оборудование" name="equipment">
                        </th>
                        <th rowspan="1" class="align-middle">
                            <div class="btn-group btn_group_fil">
                                <button type="submit" class="btn btn-outline-secondary btn_acc_gr">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                                <button type="submit" class="btn btn-outline-secondary btn_del_r">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                    </tr>
                    </form>
                </thead>
                <tfoot>
                  <form action="{{ route('addTask', $session_id) }}" method="post">
                    @csrf
                  <tr class="table-footer Hide" id="addTask">
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_order_name" value="">
                      <input type="text" autocomplete="on" id="depH" class="form-control Hide" name="department" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" placeholder="Маршрутный лист" class="form-control" name="add_route_list" value=""><br/>
                      <input type="text" autocomplete="on" placeholder="Клиентский идентификатор" class="form-control" name="add_client_id_routelist" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_name_of_machine" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_name_dse" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_operation_number" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_operation_name" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_batch_count" value="">
                    </th>
                    <th>
                      <input type="text" autocomplete="on" class="form-control" name="add_progress" value="">
                    </th>
                    <th>
                      <!--<input type="text" autocomplete="on" class="form-control" name="add_performer" value="">-->
                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="add_performer">
                        <option value=""></option>
                          @foreach($performer as $per)
                          <option value="{{ $per->FIO }}">{{ $per->FIO }}</option>
                          @endforeach
                      </select>
                    </th>
                    <th>
                      <!--<input type="text" autocomplete="on" class="form-control" name="add_equipment" value="">-->
                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="add_equipment">
                        <option value=""></option>
                          @foreach($equipment as $e)
                          <option value="{{ $e->name }}">{{ $e->name }}</option>
                          @endforeach
                      </select>
                    </th>
                    <th>
                      <button  type="submit" class="btn btn-outline-secondary btn_acc_gr" name="button">Добавить</button>
                    </th>
                  </tr>
                  </form>
                </tfoot>
                <tbody>
                  @foreach($data as $elem)
                  <tr class="Hide {{ $elem->department }} task workersTask {{$elem->status}}">
                  <!--  <tr>  -->
                        <td class="align-middle">{{ $elem->order_name }}</td>
                        <td class="align-middle">{{ $elem->route_list }}</td>
                        <td class="align-middle">{{ $elem->name_of_machine }}</td>
                        <td class="align-middle">{{ $elem->cipher_dse }}</td>
                        <td class="align-middle">{{ $elem->operation_number }}</td>
                        <td class="align-middle">{{ $elem->operation_name }}</td>
                        <td class="align-middle">{{ $elem->batch_count }}</td>
                        <td class="align-middle">{{ $elem->progress }}</td>
                        <td class="align-middle">{{ $elem->performer }}</td>
                        <td class="align-middle">{{ $elem->equipment }}</td>
                        <td class="align-middle"><button type="button" class="btn btn-primary js-open-modal {{$elem->status}}" data-modal="1" id="{{$elem->id}}" onclick="ShowRightTask(id)">Приступить</button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @include('modal1')
            </div>
        </div>

@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
document.addEventListener('keyup', function(e) {
  var key = e.keyCode;
  if (key == 27) {

      document.querySelector('.modal.show').classList.remove('show');
      document.querySelector('.modal.dblock').classList.remove('dblock');
      document.querySelector('.overlay.active').classList.remove('active');
      ShowAll();
  };
}, false);





</script>

<script type="text/javascript">
!function(e){"function"!=typeof e.matches&&(e.matches=e.msMatchesSelector||e.mozMatchesSelector||e.webkitMatchesSelector||function(e){for(var t=this,o=(t.document||t.ownerDocument).querySelectorAll(e),n=0;o[n]&&o[n]!==t;)++n;return Boolean(o[n])}),"function"!=typeof e.closest&&(e.closest=function(e){for(var t=this;t&&1===t.nodeType;){if(t.matches(e))return t;t=t.parentNode}return null})}(window.Element.prototype);

function ShowRightTask(num){
  console.log(num);
var choise1 = document.querySelectorAll(".forHide");
for (var i = 0; i < choise1.length; i++) {
  if (choise1[i].getAttribute("id")!=num) {
    choise1[i].classList.add('Hide');
  }
}
// var choise =  document.getElementById(num);
// console.log(choise);
// choise.classList.add('Hide');
}

function ShowAll(){
  var choise1 = document.querySelectorAll(".forHide");
  for (var i = 0; i < choise1.length; i++) {
    choise1[i].classList.remove('Hide');
  }
}

document.addEventListener('DOMContentLoaded', function() {

   var modalButtons = document.querySelectorAll('.js-open-modal'),
   modal2Buttons = document.querySelectorAll('.js-open-modal2'),
   overlay= document.querySelector('.js-overlay-modal'),
   overlay2 = document.querySelector('.js-overlay2-modal'),
   closeButtons = document.querySelectorAll('.close'),
   closeProgress= document.querySelectorAll('.closeProgress'),
   currentlink= window.location.href;

   var workersTask = document.getElementsByClassName("workersTask");
   console.log(workersTask.length);
   for (var i = 0; i < workersTask.length; i++) {
     if (workersTask[i].classList.contains('приостановлено')) {
       workersTask[i].classList.add('unactive')
     }
   }


   modalButtons.forEach(function(item){

      item.addEventListener('click', function(e) {

         e.preventDefault();

         var modalId = this.getAttribute('data-modal'),
         Id = this.getAttribute('id'),
             modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

         modalElem.classList.add('show');
         modalElem.classList.add('dblock');
         overlay.classList.add('active');
         if (this.classList.contains('приостановлено')) {
           var rightTask = document.getElementsByClassName('rightWindow'+Id+'')[0];
           var rightId = rightTask.getAttribute('id');
           rightTask.querySelector('.resumeWorkjs').classList.remove('Hide');
           rightTask.querySelector('.js-open-modal2').classList.add('Hide');
         } else {
           rightTask.querySelector('.resumeWorkjs').classList.add('Hide');
           //document.querySelector('.js-open-modal2').classList.remove('Hide');
         }
         rightTask.getElementsByClassName("workForm")[0].action = ``+currentlink+`/`+rightId+`/resumework`;
        rightTask.getElementsByClassName("resumeWorkjs")[0].href = ``+currentlink+`/`+rightId+`/resumework`;

      }); // end click
   }); // end foreach

   modal2Buttons.forEach(function(item){

      item.addEventListener('click', function(e) {

         e.preventDefault();

         var modalId = this.getAttribute('data-modal'),
             modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

         modalElem.classList.add('show');
         modalElem.classList.add('dblock');
         overlay2.classList.add('active');
         //var noHide = document.getElementsByClassName("noHide");
         var rightId = this.getAttribute('id');
         console.log(rightId);
         //document.getElementsByClassName("Suspend")[0].id = rightId;
        document.querySelector(".suspForm").action = ``+currentlink+`/`+rightId+`/suspendwork`;
         document.getElementsByClassName("Suspend")[0].href = ``+currentlink+`/`+rightId+`/suspendwork` ;


      }); // end click
   }); // end foreach

   closeButtons.forEach(function(item){

      item.addEventListener('click', function(e) {
         var parentModal = this.closest('.modal');

         parentModal.classList.remove('show');
         parentModal.classList.remove('dblock');
         overlay.classList.remove('active');
         overlay2.classList.remove('active');
         document.querySelector('.js-open-modal2').classList.remove('Hide');
         ShowAll();
      });

   }); // end foreach

   overlay.addEventListener('click', function() {

           document.querySelector('.modal.show').classList.remove('show');
           document.querySelector('.modal.dblock').classList.remove('dblock');
           this.classList.remove('active');
           ShowAll();
       });

  var endwork = document.querySelector('.btn.endwork')
  endwork.addEventListener('click', function(){
    document.querySelector('.modal.show').classList.remove('show');
    document.querySelector('.modal.dblock').classList.remove('dblock');
    overlay.classList.remove('active');

    ShowAll();
  })

  // closeProgress.addEventListener('click', function(){
  //   document.querySelector('.modal.show').classList.remove('show');
  //   document.querySelector('.modal.dblock').classList.remove('dblock');
  // })
  closeProgress.forEach(function(item){

     item.addEventListener('click', function(e) {
        var parentModal = this.closest('.modal');

        parentModal.classList.remove('show');
        parentModal.classList.remove('dblock');
        overlay2.classList.remove('active');
        //overlay.classList.remove('active');
     });

  }); // end foreach

}); // end ready

    function showTasks(){

      var addTask = document.getElementById("addTask");
      addTask.classList.remove("Hide");

      var chek = document.getElementsByClassName("task");
      for (var k = 0; k < chek.length; k++) {
        chek[k].classList.add('Hide')
      }
      var tasks = document.getElementsByClassName("task");
      for (var k = 0; k < chek.length; k++) {
        tasks[k]=chek[k];
      }
      var department = document.getElementById("department");
      for(i=0; i<tasks.length; i++){

        if (tasks[i].classList.contains(department.value)) {
          console.log(tasks[i].classList);
          tasks[i].classList.remove("Hide")
          }
      }
      document.getElementById("depH").value = department.value;
    }

  // [{"order_name":"l38-10","route_list":"473","name_of_machine":"Токарно-винторезный","cipher_dse":"J3-34.6","operation_number":"22","operation_name":"термическая резка",
  // "batch_count":"6","progress":"40","performer":"Рабочев Р.Р","equipment":"Резак"},{"order_name":"y57-4","route_list":"493","name_of_machine":"Ленточно-отрезной",
  // "cipher_dse":"U8-56.5","operation_number":"2","operation_name":"гильотнная резка","batch_count":"1","progress":"78","performer":"Рабочев Р.Р","equipment":"Гильотина"}]
</script>
