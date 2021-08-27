<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FilterRequest;

use App\Exports\OrderingExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class CehController extends Controller
{
  public function batchFilter($req){
    $where = [];
    if (($req->batch != null)){
        $where[] = "batch = \"".$req->batch."\"";
    }
    if (($req->route_list != null)){
        $where[] = "route_list = \"".$req->route_list."\"";
    }
    if (($req->cipher != null)){
        $where[] = "cipher = \"".$req->cipher."\"";
    }
    if (($req->batch_count1 != null)){
        $where[] = "batch_count = \"".$req->batch_count1."\"";
    }
    if (($req->order != null)){
        $where[] = "order = \"".$req->order."\"";
    }
    if (($req->start_dateTime1 != null)){
        $where[] = "start_dateTime = \"".$req->start_dateTime1."\"";
    }
    if (($req->end_dateTime1 != null)){
        $where[] = "end_dateTime = \"".$req->end_dateTime1."\"";
    }
      dump($_GET);
      dump($req);
      dump($where);
    $order = [];
    if (($req->batch_count2 != null)){
        $order[] = "batch_count ".$req->batch_count2;
    }
    if (($req->start_dateTime2 != null)){
        $order[] = "start_dateTime ".$req->start_dateTime2;
    }
    if (($req->end_dateTime2 != null)){
        $order[] = "end_dateTime ".$req->end_dateTime2;
    }

    $where = implode(" AND ", $where);
    $order = implode(", ", $order);

    return [$where, $order];
  }

  public function tasksFilter($req){
    $where = [];
    if (($req->order_name != null)){
        $where[] = "order_name = \"".$req->order_name."\"";
    }
    if (($req->route_list != null)){
        $where[] = "route_list = \"".$req->route_list."\"";
    }
    if (($req->name_dse != null)){
        $where[] = "name_dse = \"".$req->name_dse."\"";
    }
    if (($req->name_of_machine != null)){
        $where[] = "name_of_machine = \"".$req->name_of_machine."\"";
    }
    if (($req->batch_count1 != null)){
        $where[] = "batch_count = \"".$req->batch_count1."\"";
    }
    if (($req->progress1 != null)){
        $where[] = "progress = \"".$req->progress1."\"";
    }
    if (($req->operation_name != null)){
        $where[] = "operation_name = \"".$req->operation_name."\"";
    }
    if (($req->operation_number1 != null)){
        $where[] = "operation_number = \"".$req->operation_number1."\"";
    }
    if (($req->performer != null)){
        $where[] = "performer = \"".$req->performer."\"";
    }
    if (($req->equipment != null)){
        $where[] = "equipment = \"".$req->equipment."\"";
    }

        $order = [];
        if (($req->batch_count2 != null)){
            $order[] = "batch_count ".$req->batch_count2;
        }
        if (($req->progress2 != null)){
            $order[] = "progress ".$req->progress2;
        }
        if (($req->operation_number2 != null)){
            $order[] = "operation_number ".$req->operation_number2;
        }

        $where = implode(" AND ", $where);
        $order = implode(", ", $order);

        return [$where, $order];
  }

  /*public function index(){
    return 'Страница авторизации';
    //return view('main');
  }*/

  public function sessions(FilterRequest $req){
    //$sessions = DB::table('sessions')->get();

    $where = [];
    if (($req->order_number1 != null)){
        $where[] = "order_number = \"".$req->order_number1."\"";
    }
    if (($req->type_of_plan != null)){
        $where[] = "type_of_plan = \"".$req->type_of_plan."\"";
    }
    if (($req->start_of_plan1 != null)){
        $where[] = "start_of_plan = \"".$req->start_of_plan1."\"";
    }
    if (($req->end_of_plan1 != null)){
        $where[] = "end_of_plan = \"".$req->end_of_plan1."\"";
    }
    if (($req->information_on_professions != null)){
        $where[] = "information_on_professions = \"".$req->information_on_professions."\"";
    }
    if (($req->duration_of_execution1 != null)){
        $where[] = "duration_of_execution = \"".$req->duration_of_execution1."\"";
    }

    $order = [];
    if (($req->order_number2 != null)){
        $order[] = "order_number ".$req->order_number2;
    }
    if (($req->start_of_plan2 != null)){
        $order[] = "start_of_plan ".$req->start_of_plan2;
    }
    if (($req->end_of_plan2 != null)){
        $order[] = "end_of_plan ".$req->end_of_plan2;
    }
    if (($req->duration_of_execution2 != null)){
        $order[] = "duration_of_execution ".$req->duration_of_execution2;
    }

    $where = implode(" AND ", $where);
    $order = implode(", ", $order);

    if ($where != "" && $order != ""){
      $sessions = DB::select('select * from sessions where '.$where.' order by  progress DESC,'.$order);
    } elseif ($where != "" && $order == "") {
      $sessions = DB::select('select * from sessions where '.$where.' order by  progress DESC');
    } elseif ($where == "" && $order != "") {
      $sessions = DB::select('select * from sessions order by  progress DESC,'.$order);
    }
    else
      $sessions = DB::select('select * from sessions order by progress DESC');
    //return $sessions;
    //return 'Страница списка сессий';
    return view('index', [
      'data' => $sessions
    ]);
  }

  public function deleteSession($session){
  //  DB::table('sessions')->find($session)->delete();
    DB::table('sessions')
              ->where('id', $session)
              ->delete();
    return redirect()->route('sessions');
  }

  public function session($session, FilterRequest $req){
    //$orders = DB::select("select * from ordering where order_number = {$session}");

    $where = [];
    if (($req->order_name != null)){
        $where[] = "order_name = \"".$req->order_name."\"";
    }
    if (($req->cipher_dse != null)){
        $where[] = "cipher_dse = \"".$req->cipher_dse."\"";
    }
    if (($req->cipher != null)){
        $where[] = "cipher = \"".$req->cipher."\"";
    }
    if (($req->count_dse1 != null)){
        $where[] = "count_dse = \"".$req->count_dse1."\"";
    }
    if (($req->name_of_machine != null)){
        $where[] = "name_of_machine = \"".$req->name_of_machine."\"";
    }
    if (($req->type_of_specification != null)){
        $where[] = "type_of_specification = \"".$req->type_of_specification."\"";
    }
    if (($req->operation_number1 != null)){
        $where[] = "operation_number = \"".$req->operation_number1."\"";
    }
    if (($req->operation_start_dateTime1 != null)){
        $where[] = "operation_start_dateTime = \"".$req->operation_start_dateTime1."\"";
    }
    if (($req->operation_end_dateTime1 != null)){
        $where[] = "operation_end_dateTime = \"".$req->operation_end_dateTime1."\"";
    }

    $order = [];
    if (($req->count_dse2 != null)){
        $order[] = "count_dse ".$req->count_dse2;
    }
    if (($req->operation_number2 != null)){
        $order[] = "operation_number ".$req->operation_number2;
    }
    if (($req->operation_start_dateTime2 != null)){
        $order[] = "operation_start_dateTime ".$req->operation_start_dateTime2;
    }
    if (($req->operation_end_dateTime2 != null)){
        $order[] = "operation_end_dateTime ".$req->operation_end_dateTime2;
    }

    $where = implode(" AND ", $where);
    $order = implode(", ", $order);

    // if ($where != ""){
    //   $orders = DB::select("select * from ordering where ".$where." AND order_number = {$session}");
    // }
    // else
    //   $orders = DB::select("select * from ordering where order_number = {$session}");

    $order_number = DB::select("select order_number from sessions where id = {$session}");

      if ($where != "" && $order != ""){
        $orders = DB::select("select * from ordering where ".$where." AND order_number = {$order_number[0]->order_number} order by ".$order);
      } elseif ($where != "" && $order == "") {
        $orders = DB::select("select * from ordering where ".$where." AND order_number = {$order_number[0]->order_number}");
      } elseif ($where == "" && $order != "") {
        $orders = DB::select("select * from ordering where order_number = {$order_number[0]->order_number} order by ".$order);

      }
      else{
        $orders = DB::select("select * from ordering where order_number = {$order_number[0]->order_number}");
      }

    //return $orders;
    //return 'Страница списка задач сессии';
    return view('schedule', [
      'data' => $orders,
      'session_id' => $session
    ]);
  }

  // public function applications(){
  //   return 'страница приложений';
  //   return view('app');
  // }

  // public function planner(){
  //   return 'стрница планировщика';
  //   //return view('main');
  // }

  public function inProduction(FilterRequest $req){
    //$batch = DB::select('select * from batch where status = "в производстве"');
     $query = $this->batchFilter($req);
    // if ($where != ""){
    //   $batch = DB::select('select * from batch where '.$where.' AND status = "в производстве"');
    // }
    // else
    //   $batch = DB::select('select * from batch where status = "в производстве"');
    if ($query[0] != "" && $query[1] != ""){
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "в производстве" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "в производстве"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $batch = DB::select('select * from batch where status = "в производстве" order by '.$query[1]);
    }
    else
      $batch = DB::select('select * from batch where status = "в производстве"');

    //return $batch;
    return view('planlist', [
      'data' => $batch
    ]);
  }

  public function pause($batch){
    //DB::table('batch')->find($batch)->update(['status' => 'приостановлено']);
    DB::table('batch')
              ->where('id', $batch)
              ->update(['status' => 'приостановлено']);
    return redirect()->route('inProduction');
  }

  public function finish($batch){
    // DB::table('batch')->find($batch)->update(['status' => 'завершено']);
    DB::table('batch')
              ->where('id', $batch)
              ->update(['status' => 'завершено']);
    return redirect()->route('inProduction');
  }

  public function toLaunch(FilterRequest $req){
    //$batch = DB::select('select * from batch where status = "на запуск"');

    $query = $this->batchFilter($req);
    if ($query[0] != "" && $query[1] != ""){
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "на запуск" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "на запуск"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $batch = DB::select('select * from batch where status = "на запуск" order by '.$query[1]);
    }
    else
      $batch = DB::select('select * from batch where status = "на запуск"');

  //  return $batch;
    return view('planlist', [
      'data' => $batch
    ]);
  }

  public function startToLaunch($batch){
     //DB::table('batch')->find($batch)->update(['status' => 'в производстве']);
    DB::table('batch')
              ->where('id', $batch)
              ->update(['status' => 'в производстве']);
    return redirect()->route('toLaunch');
  }
  public function startSuspended($batch){
     //DB::table('batch')->find($batch)->update(['status' => 'в производстве']);
    DB::table('batch')
              ->where('id', $batch)
              ->update(['status' => 'в производстве']);
    return redirect()->route('suspended');
  }

  public function suspended(FilterRequest $req){
    //$batch = DB::select('select * from batch where status = "приостановлено"');

    $query = $this->batchFilter($req);
    if ($query[0] != "" && $query[1] != ""){
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "приостановлено" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "приостановлено"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $batch = DB::select('select * from batch where status = "приостановлено" order by '.$query[1]);
    }
    else
      $batch = DB::select('select * from batch where status = "приостановлено"');

    //return $batch;
    return view('planlist', [
      'data' => $batch
    ]);
  }

  public function plannerCompleted(FilterRequest $req){
    //$batch = DB::select('select * from batch where status = "завершено"');

    $query = $this->batchFilter($req);
    if ($query[0] != "" && $query[1] != ""){
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "завершено" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $batch = DB::select('select * from batch where '.$query[0].' AND status = "завершено"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $batch = DB::select('select * from batch where status = "завершено" order by '.$query[1]);
    }
    else
      $batch = DB::select('select * from batch where status = "завершено"');

    //return $batch;
    return view('planlist', [
      'data' => $batch
    ]);
  }

  // public function master(){
  //   return 'страница мастера';
  //   //return view('main');
  // }

  public function perform(FilterRequest $req){
    //$tasks = DB::select('select * from tasks where status = "в работе" OR status = "приостановлено" OR status = "требуется выполнить"');
    //$tasks = DB::select('select * from tasks where status != "завершено"');

    // $where = $this->tasksFilter($req);
    // if ($where != ""){
    //   $tasks = DB::select('select * from tasks where '.$where.' AND status != "завершено"');
    // }
    // else
    //   $tasks = DB::select('select * from tasks where status != "завершено"');
    $query = $this->tasksFilter($req);
    if ($query[0] != "" && $query[1] != ""){
      $tasks = DB::select('select * from tasks where '.$query[0].' AND status != "завершено" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $tasks = DB::select('select * from tasks where '.$query[0].' AND status != "завершено"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $tasks = DB::select('select * from tasks where status != "завершено" order by '.$query[1]);
    }
    else
      $tasks = DB::select('select * from tasks where status != "завершено"');

    //return $tasks;
    return view('master', [
      'data' => $tasks
    ]);
  }

  public function masterCompleted(FilterRequest $req){
    //$tasks = DB::select('select * from tasks where status = "завершено"');

    $query = $this->tasksFilter($req);
    if ($query[0] != "" && $query[1] != ""){
      $tasks = DB::select('select * from tasks where '.$query[0].' AND status = "завершено" order by '.$query[1]);
    } elseif ($query[0] != "" && $query[1] == "") {
      $tasks = DB::select('select * from tasks where '.$query[0].' AND status = "завершено"');
    } elseif ($query[0] == "" && $query[1] != "") {
      $tasks = DB::select('select * from tasks where status = "завершено" order by '.$query[1]);
    }
    else
      $tasks = DB::select('select * from tasks where status = "завершено"');

    //return $tasks;
    return view('master', [
      'data' => $tasks
    ]);
  }

  public function worker(){
    $tasks = DB::select('select * from tasks where status != "завершено"');
    //return $tasks;
    return view('work', [
      'data' => $tasks
    ]);
  }

  public function export($session){ 
    $order_number = DB::select("select order_number from sessions where id = {$session}");
    $collection = DB::table('ordering')->select('order_name','cipher_dse','cipher','count_dse','name_of_machine','type_of_specification','operation_number','operation_start_dateTime','operation_end_dateTime')->where('order_number', $order_number[0]->order_number)->get();

   //$collection = DB::select("select order_number,order_name,cipher_dse,cipher,count_dse,name_of_machine,type_of_specification,operation_number,operation_start_dateTime,operation_end_dateTime from orderings where order_number = $session");
    $collection->prepend([
      'Наименование заказа',
      'Шифр ДСЕ',
      'Шифр',
      'Кол-во ДСЕ в партии',
      'Наименование станка',
      'Тип спецификации',
      'Номер операции',
      'Дата и время начала операции',
      'Дата и время окончания операции',
    ]);

    return (new OrderingExport($collection))->download('ordering.xlsx');
  }
}
