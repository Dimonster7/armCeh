<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Ordering;
use App\Models\Batch;
use App\Models\Task;
use App\Models\Department;
use App\Models\Performer;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FilterRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

use App\Exports\OrderingExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class CehController extends Controller
{
  public function batchFilter($req){
    $batchs = new Batch;

    if (($req->batch != null)){
        $batchs = $batchs->where('batch', $req->batch);
    }
    if (($req->route_list != null)){
        $batchs = $batchs->where('route_list', $req->route_list);
    }
    if (($req->cipher != null)){
        $batchs = $batchs->where('cipher', $req->cipher);
    }
    if (($req->batch_count1 != null)){
        $batchs = $batchs->where('batch_count', $req->batch_count1);
    }
    if (($req->order != null)){
        $batchs = $batchs->where('order', $req->order);
    }
    if (($req->start_dateTime1 != null)){
        $batchs = $batchs->where('start_dateTime', $req->start_dateTime1);
    }
    if (($req->end_dateTime1 != null)){
        $batchs = $batchs->where('end_dateTime', $req->end_dateTime1);
    }

    if (($req->batch_count2 != null)){
        $batchs = $batchs->orderBy('batch_count', $req->batch_count2);
    }
    if (($req->start_dateTime2 != null)){
        $batchs = $batchs->orderBy('start_dateTime', $req->start_dateTime2);
    }
    if (($req->end_dateTime2 != null)){
        $batchs = $batchs->orderBy('end_dateTime', $req->end_dateTime2);
    }

    return $batchs;
  }

  public function tasksFilter($req){
    $tasks = new Task;

    if (($req->order_name != null)){
        $tasks = $tasks->where('order_name', $req->order_name);
    }
    if (($req->route_list != null)){
        $tasks = $tasks->where('route_list', $req->route_list);
    }
    if (($req->name_dse != null)){
        $tasks = $tasks->where('name_dse', $req->name_dse);
    }
    if (($req->name_of_machine != null)){
        $tasks = $tasks->where('name_of_machine', $req->name_of_machine);
    }
    if (($req->batch_count1 != null)){
        $tasks = $tasks->where('batch_count', $req->batch_count1);
    }
    if (($req->progress1 != null)){
        $tasks = $tasks->where('progress', $req->progress1);
    }
    if (($req->operation_name != null)){
        $tasks = $tasks->where('operation_name', $req->operation_name);
    }
    if (($req->operation_number1 != null)){
        $tasks = $tasks->where('operation_number', $req->operation_number1);
    }
    if (($req->performer != null)){
        $tasks = $tasks->where('performer', $req->performer);
    }
    if (($req->equipment != null)){
        $tasks = $tasks->where('equipment', $req->equipment);
    }
    if (($req->withoutPerformer != null)){
        $tasks = $tasks->where('performer', '');
    }
    if (($req->withoutEquipment != null)){
        $tasks = $tasks->where('equipment', '');
    }

    if (($req->batch_count2 != null)){
        $tasks = $tasks->orderBy('batch_count', $req->batch_count2);
    }
    if (($req->progress2 != null)){
        $tasks = $tasks->orderBy('progress', $req->progress2);
    }
    if (($req->operation_number2 != null)){
        $tasks = $tasks->orderBy('operation_number', $req->operation_number2);
    }

    return $tasks;
  }

  /*public function index(){
    return 'Страница авторизации';
    //return view('main');
  }*/

  public function sessions(FilterRequest $req){
    //$req->flash();

    // $req->session()->flush();
    // dump($req->session());
     // $i=Input::all();
     // if($i){
     //   dump('chto-to est`');
     //   dump($i);
     // } else {
     //   dump('pusto');
     //   dump($i);
     // }
    // dump(isset($i));
    // dump($i);
    $sessions = new Session;

    if (($req->order_number1 != null)){
        $sessions = $sessions->where('order_number', $req->order_number1);
    }
    if (($req->type_of_plan != null)){
        $sessions = $sessions->where('type_of_plan', $req->type_of_plan);
    }
    if (($req->start_of_plan1 != null)){
        $sessions = $sessions->where('start_of_plan', $req->start_of_plan1);
    }
    if (($req->end_of_plan1 != null)){
        $sessions = $sessions->where('end_of_plan', $req->end_of_plan1);
    }
    if (($req->information_on_professions != null)){
        $sessions = $sessions->where('information_on_professions', $req->information_on_professions);
    }
    if (($req->duration_of_execution1 != null)){
        $sessions = $sessions->where('duration_of_execution', $req->duration_of_execution1);
    }
    if (($req->progress1 != null)){
        $sessions = $sessions->where('progress', $req->progress1);
    }

    if (($req->order_number2 != null)){
        $sessions = $sessions->orderBy('order_number', $req->order_number2);
    }
    if (($req->start_of_plan2 != null)){
        $sessions = $sessions->orderBy('start_of_plan', $req->start_of_plan2);
    }
    if (($req->end_of_plan2 != null)){
        $sessions = $sessions->orderBy('end_of_plan', $req->end_of_plan2);
    }
    if (($req->duration_of_execution2 != null)){
        $sessions = $sessions->orderBy('duration_of_execution', $req->duration_of_execution2);
    }
    if (($req->progress2 != null)){
        $sessions = $sessions->orderBy('progress', $req->progress2);
    }

    return view('index', [
      'data' => $sessions->paginate(15)->appends(request()->query()),
      //'input' => Input::all()
    ]);
  }

  public function deleteSession($session){
    Session::where('id', $session)->delete();

    return redirect()->route('sessions');
  }

  public function session($session, FilterRequest $req){
    $orders = new Ordering;
    // $order_number = new Session;
    // $order_number = $order_number->select('order_number')->where('id', $session)->get();
    // $orders = $orders->where('order_number', $order_number[0]->order_number);
    $orders = $orders->where('session_id', $session);

    if (($req->order_name != null)){
        $orders = $orders->where('order_name', $req->order_name);
    }
    if (($req->cipher_dse != null)){
        $orders = $orders->where('cipher_dse', $req->cipher_dse);
    }
    if (($req->cipher != null)){
        $orders = $orders->where('cipher', $req->cipher);
    }
    if (($req->count_dse1 != null)){
        $orders = $orders->where('count_dse', $req->count_dse1);
    }
    if (($req->name_of_machine != null)){
        $orders = $orders->where('name_of_machine', $req->name_of_machine);
    }
    if (($req->type_of_specification != null)){
        $orders = $orders->where('type_of_specification', $req->type_of_specification);
    }
    if (($req->operation_number1 != null)){
        $orders = $orders->where('operation_number', $req->operation_number1);
    }
    if (($req->operation_start_dateTime1 != null)){
        $orders = $orders->where('operation_start_dateTime', $req->operation_start_dateTime1);
    }
    if (($req->operation_end_dateTime1 != null)){
        $orders = $orders->where('operation_end_dateTime', $req->operation_end_dateTime1);
    }

    if (($req->count_dse2 != null)){
        $orders = $orders->orderBy('count_dse', $req->count_dse2);
    }
    if (($req->operation_number2 != null)){
        $orders = $orders->orderBy('operation_number', $req->operation_number2);
    }
    if (($req->operation_start_dateTime2 != null)){
        $orders = $orders->orderBy('operation_start_dateTime', $req->operation_start_dateTime2);
    }
    if (($req->operation_end_dateTime2 != null)){
        $orders = $orders->orderBy('operation_end_dateTime', $req->operation_end_dateTime2);
    }

      return view('schedule', [
        'data' => $orders->paginate(15)->appends(request()->query()),
        'session_id' => $session
      ]);
  }

  public function app($session){
    return view('app', [
      'session_id' => $session
    ]);
  }

  public function inProduction($session, FilterRequest $req){
    $batchs = $this->batchFilter($req);
    $batchs = $batchs->where('status', 'в производстве')->where('session_id', $session);

    return view('planlist', [
      'data' => $batchs->paginate(15)->appends(request()->query()),
      'session_id' => $session
    ]);
  }

  public function pause($session, $batch){
    Batch::where('id', $batch)
              ->update(['status' => 'приостановлено']);
    return redirect()->route('inProduction', $session);
  }

  public function finish($session, $batch, FilterRequest $req){
    Batch::where('id', $batch)
              ->update(['status' => 'завершено']);

    if($req->is('sessions/'.$session.'/applications/planner/inProduction*')){
      return redirect()->route('inProduction', $session);
    } else {
      return redirect()->route('suspended', $session);
    }
  }

  public function toLaunch($session, FilterRequest $req){
    $batchs = $this->batchFilter($req);
    $batchs = $batchs->where('status', 'на запуск')->where('session_id', $session);

    return view('planlist', [
      'data' => $batchs->paginate(15)->appends(request()->query()),
      'session_id' => $session
    ]);
  }

  public function start($session, $batch, FilterRequest $req){
    Batch::where('id', $batch)
              ->update(['status' => 'в производстве']);

    if($req->is('sessions/'.$session.'/applications/planner/toLaunch*')){
      return redirect()->route('toLaunch', $session);
    } else {
      return redirect()->route('suspended', $session);
    }
  }

  public function suspended($session, FilterRequest $req){
    $batchs = $this->batchFilter($req);
    $batchs = $batchs->where('status', 'приостановлено')->where('session_id', $session);

    return view('planlist', [
      'data' => $batchs->paginate(15),
      'session_id' => $session
    ]);
  }

  public function plannerCompleted($session, FilterRequest $req){
    $batchs = $this->batchFilter($req);
    $batchs = $batchs->where('status', 'завершено')->where('session_id', $session);

    return view('planlist', [
      'data' => $batchs->paginate(15)->appends(request()->query()),
      'session_id' => $session
    ]);
  }

  public function perform($session, FilterRequest $req){
    $department = Department::all();
    $performer = Performer::all();
    $equipment = Equipment::all();

    $tasks = $this->tasksFilter($req);
    $tasks = $tasks->where('status', '!=', 'завершено')->where('session_id', $session)->where('session_id', $session);

    $progressTask = Task::select('progress')->get();
    $sumProgress = 0;
    foreach($progressTask as $progress){
      $sumProgress += $progress->progress;
    }

    Session::where('id', $session)->update(['progress' => round($sumProgress/$progressTask->count(), 1)]);

    return view('master', [
      'data' => $tasks->get(),
      'dep' => $department,
      'performer' => $performer,
      'equipment' => $equipment,
      'session_id' => $session
    ]);
  }

  public function masterCompleted($session, FilterRequest $req){
    $department = Department::all();

    $tasks = $this->tasksFilter($req);
    $tasks = $tasks->where('status', 'завершено')->where('session_id', $session);

    return view('master', [
      'data' => $tasks->get(),
      'dep' => $department,
      'session_id' => $session
    ]);
  }

  public function finishTask($session, $task, FilterRequest $req){
    Task::where('id', $task)
              ->update([
                    'status' => 'завершено',
                    'progress' => '100'
                  ]);

    if($req->is('sessions/'.$session.'/applications/master*')){
      return redirect()->route('perform', $session);
    } else {
      return redirect()->route('worker', $session);
    }
  }

  public function worker($session){
    $tasks = new Task;
    $tasks = $tasks->where('status', '!=', 'завершено')->where('session_id', $session)->orderBy('progress', 'DESC')->get();

    $progressTask = Task::select('progress')->where('session_id', $session)->get();
    if($progressTask->count() != 0){
      $sumProgress = 0;
      foreach($progressTask as $progress){
        $sumProgress += $progress->progress;
      }
      
      Session::where('id', $session)->update(['progress' => round($sumProgress/$progressTask->count(), 1)]);
    }
    return view('work', [
      'data' => $tasks,
      'session_id' => $session
    ]);
  }

  public function export($session){
    $collection = Ordering::select('cipher_dse','cipher','count_dse','name_of_machine','type_of_specification','operation_number','operation_start_dateTime','operation_end_dateTime')->where('session_id', $session)->get();

    $collection->prepend([
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

  public function comment($session, $task, FilterRequest $req){
    if($req->is('sessions/'.$session.'/applications/master*')){
      Task::where('id', $task)
                ->update([
                      'comment' => $req->comment,
                      'performer' => $req->performer,
                      'equipment' => $req->equipment
                    ]);
    } else {
      Task::where('id', $task)
                ->update([
                      'comment' => $req->comment
                    ]);
    }

    if($req->is('sessions/'.$session.'/applications/master*')){
      return redirect()->route('perform', $session);
    } else {
      return redirect()->route('worker', $session);
    }
  }

  public function changeProgressAndStatus ($session, $task, FilterRequest $req){
    Task::where('id', $task)
              ->update(['progress' => $req->changeProgress]);
    Task::where('id', $task)
              ->update(['status' => 'приостановлено']);

    if($req->is('sessions/'.$session.'/applications/master*')){
      return redirect()->route('perform', $session);
    } else {
      return redirect()->route('worker', $session);
    }
  }

  public function resumework($session, $id, FilterRequest $req){
    Task::where('id', $id)
              ->update(['status' => 'в работе']);

    if($req->is('sessions/'.$session.'/applications/master*')){
      return redirect()->route('perform', $session);
    } else {
      return redirect()->route('worker', $session);
    }
  }

  // public function clear(FilterRequest $req){
  //   $req->session()->flush();
  //   //return $this->sessions($req);
  //   return redirect(url()->previous());
  // }

  public function addSession(FilterRequest $req){
    Session::insert([
      'order_number' => $req->add_order_number,
      'type_of_plan' => $req->add_type_of_plan,
      'start_of_plan' => $req->add_start_of_plan,
      'end_of_plan' => $req->add_end_of_plan,
      'information_on_professions' => $req->add_information_on_professions,
      'duration_of_execution' => $req->add_duration_of_execution,
      'progress' => $req->add_progress
    ]);

      return redirect(url()->previous());
  }

  public function addOrder($session, FilterRequest $req){
    Ordering::insert([
      'session_id' => $session,
      'order_name' => $req->add_order_name,
      'cipher_dse' => $req->add_cipher_dse,
      'cipher' => $req->add_cipher,
      'count_dse' => $req->add_count_dse,
      'name_of_machine' => $req->add_name_of_machine,
      'type_of_specification' => $req->add_type_of_specification,
      'operation_number' => $req->add_operation_number,
      'operation_start_dateTime' => $req->add_operation_start_dateTime,
      'operation_end_dateTime' => $req->add_operation_end_dateTime
    ]);

      return redirect(url()->previous());
  }

  public function addBatch($session, FilterRequest $req){
    Batch::insert([
      'session_id' => $session,
      'batch' => $req->add_batch,
      'route_list' => $req->add_route_list,
      'cipher' => $req->add_cipher,
      'batch_count' => $req->add_batch_count,
      'order' => $req->add_order,
      'start_dateTime' => $req->add_start_dateTime,
      'end_dateTime' => $req->add_end_dateTime,
      'status' => 'на запуск',
    ]);

      return redirect(url()->previous());
  }

  public function addTask($session, FilterRequest $req){
    Task::insert([
      'session_id' => $session,
      'department' => $req->department,
      'order_name' => $req->add_order_name,
      'route_list' => $req->add_route_list,
      'client_id_routelist' => $req->add_client_id_routelist,
      'name_of_machine' => $req->add_name_of_machine,
      'name_dse' => $req->add_name_dse,
      'operation_number' => $req->add_operation_number,
      'operation_name' => $req->add_operation_name,
      'batch_count' => $req->add_batch_count,
      'progress' => $req->add_progress,
      'performer' => $req->add_performer,
      'equipment' => $req->add_equipment,
      'status' => 'в работе'
      //cipher_dse
      //cipher
      //start_dateTime
      //end_dateTime
    ]);

      return redirect(url()->previous());
  }

}
