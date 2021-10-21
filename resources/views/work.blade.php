@extends('layouts.base')

@section('title', 'Рабочий')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <table class="table table-bordered table_w">
                    <thead>
                        <tr>
                            <th rowspan="1" class="align-middle"> Клиент- <br> ский иден- <br> тификатор маршрут- <br> ного
                                листа</th>
                            <th colspan="1" class="align-middle">Имя заказа</th>
                            <th rowspan="1" class="align-middle">Наименование ДСЕ</th>
                            <th rowspan="1" class="align-middle">Шифр <br> ДСЕ</th>
                            <th rowspan="1" class="align-middle">Шифр</th>
                            <th rowspan="1" class="align-middle">Размер партии</th>
                            <th rowspan="1" class="align-middle">Номер операции</th>
                            <th rowspan="1" class="align-middle">Наимено- <br> вание операции</th>
                            <th rowspan="1" class="align-middle">Прогресс выполнения, %</th>
                            <th rowspan="1" class="align-middle">Исполнители</th>
                            <th rowspan="1" class="align-middle">Обору- <br> дование</th>
                            <th rowspan="1" class="align-middle">Плановые дата и время начала операции</th>
                            <th rowspan="1" class="align-middle">Плановые дата и время окончания операции</th>
                            <th rowspan="1" class="align-middle">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $elem)
                        <tr class="workersTask {{$elem->status}}">
                            <td class="align-middle">{{ $elem->client_id_routelist }}</td>
                            <td class="align-middle">{{ $elem->order_name }}</td>
                            <td class="align-middle">{{ $elem->name_dse }}</td>
                            <td class="align-middle">{{ $elem->cipher_dse }}</td>
                            <td class="align-middle">{{ $elem->cipher }}</td>
                            <td class="align-middle">{{ $elem->batch_count }}</td>
                            <td class="align-middle">{{ $elem->operation_number }}</td>
                            <td class="align-middle">{{ $elem->operation_name }}</td>
                            <td class="align-middle">{{ $elem->progress }}</td>
                            <td class="align-middle">{{ $elem->performer }}</td>
                            <td class="align-middle">{{ $elem->equipment }}</td>
                            <td class="align-middle">{{ $elem->start_dateTime }}</td>
                            <td class="align-middle">{{ $elem->end_dateTime }}</td>
                            <td class="align-middle"><button type="button" class="btn btn-primary js-open-modal {{$elem->status}}"  data-modal="1" id="{{$elem->id}}" onclick="ShowRightTask(id)">
                                    Приступить
                                </button></td>
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
           console.log("Работает");
           console.log(Id);
           var rightTask = document.getElementsByClassName('rightWindow'+Id+'')[0];
           var rightId = rightTask.getAttribute('id');
           console.log(rightTask);
           rightTask.querySelector('.resumeWorkjs').classList.remove('Hide');
           rightTask.querySelector('.js-open-modal2').classList.add('Hide');
         } else {
           console.log('Не работает');
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
    }

  // [{"order_name":"l38-10","route_list":"473","name_of_machine":"Токарно-винторезный","cipher_dse":"J3-34.6","operation_number":"22","operation_name":"термическая резка",
  // "batch_count":"6","progress":"40","performer":"Рабочев Р.Р","equipment":"Резак"},{"order_name":"y57-4","route_list":"493","name_of_machine":"Ленточно-отрезной",
  // "cipher_dse":"U8-56.5","operation_number":"2","operation_name":"гильотнная резка","batch_count":"1","progress":"78","performer":"Рабочев Р.Р","equipment":"Гильотина"}]
</script>
