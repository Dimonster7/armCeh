
            <!-- The Modal -->
            <div class="modal fade modal_dark scroll" data-modal="1" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Просмотр операции маршрутного листа</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        @foreach($data as $elem)
                        <div class="modal-body forHide rightWindow{{$elem->id}}" id="{{$elem->id}}">
                            <div class="details_list">
                                <div class="wrap_details">
                                    <div class="title_details">
                                        <p>Детали</p>
                                    </div>
                                    <div class="btn_modal">
                                      <form class="" action="" method="post">
                                      @csrf
                                        <button type="button" id="{{$elem->id}}" class="btn btn-light btn_left_b  js-open-modal2 {{Route::is('masterCompleted') ? 'Hide' : ''}}" data-modal="2">
                                            Приостановить работу
                                        </button>
                                        </form>

                                        <form class="workForm" action="" method="post">
                                        @csrf
                                          <a class="resumeWorkjs Hide {{$elem->id}}" href=""><button class="btn btn-light {{Route::is('masterCompleted') ? 'Hide' : ''}}">Продолжить работу</button></a>
                                      </form>

                                        <form class="" action="{{Route::is('worker') ? route('finishTaskWorker', ['session' => $session_id, 'task' => $elem->id]) : route('finishTaskMaster', ['session' => $session_id, 'task' => $elem->id])}}" method="post">
                                          @csrf
                                          <a href="{{Route::is('worker') ? route('finishTaskWorker', ['session' => $session_id, 'task' => $elem->id]) : route('finishTaskMaster', ['session' => $session_id, 'task' => $elem->id])}}"><button class="btn btn-light endwork {{Route::is('masterCompleted') ? 'Hide' : ''}}">Завершить работу</button></a>
                                      </form>
                                    </div>
                                </div>

                                <div class="wrap_details">
                                    <div class="item_details1">
                                        <p>Номер операции:</p>
                                        <p>Операция:</p>
                                        <p>ДСЕ:</p>
                                    </div>

                                    <div class="item_details2">
                                        <p>{{ $elem->operation_number }}</p>
                                        <p>{{ $elem->operation_name }}</p>
                                        <p>{{ $elem->name_dse }} {{ $elem->cipher_dse }}</p>
                                    </div>

                                    <div class="item_details3">
                                        <p>Статус операции:</p>
                                        <p>Прогресс выполнения:</p>
                                        <p>Плановая дата начала:</p>
                                        <p>Плановая дата окончания:</p>

                                    </div>

                                    <div class="item_details4">
                                        <div class="status_op">
                                            <p>{{ $elem->status }}</p>
                                        </div>
                                        <p>{{ $elem->progress }}</p>
                                        <p>{{ $elem->start_dateTime }}</p>
                                        <p>{{ $elem->end_dateTime }}</p>

                                    </div>
                                </div>

                                <div class="wrap_details down">
                                    <div class="item_details1_1">
                                        <p>Размер партии:</p>
                                        <p>Заказ:</p>
                                        <p>Маршрутный лист:</p>
                                    </div>

                                    <div class="item_details2_1">
                                        <p>{{ $elem->batch_count }}</p>
                                        <p>{{ $elem->order_name }}</p>
                                        <p>{{ $elem->route_list }}</p>
                                    </div>

                                    <div class="item_details3_1">
                                        <p>Подразделение:</p>
                                        <p>Класс РЦ:</p>
                                    </div>

                                    <div class="item_details4_1">
                                        <p>{{ $elem->department }}</p>
                                        <p>{{ $elem->name_of_machine }}</p>
                                    </div>
                                </div>

                                <form class="" action="{{Route::is('worker') ? route('commentWorker', ['session' => $session_id, 'task' => $elem->id]) : route('commentMaster', ['session' => $session_id, 'task' => $elem->id])}}" method="post">
                                  @csrf
                                  <div class="wrap_details">
                                      <div class="sort_details">
                                          <div class="title_details">
                                              <p>Исполнители</p>
                                          </div>
                                          <select class="select_details" name="performer" id="" @if(!Route::is('perform')) disabled @endif>
                                            <option value="">{{ Route::is('worker') ? $elem->performer : 'Не выбрано' }}</option>
                                            @if(Route::is('perform'))
                                              @foreach($performer as $per)
                                              <option value="{{ $per->FIO }}">{{ $per->FIO }}</option>
                                              @endforeach
                                            @endif
                                          </select>
                                      </div>

                                      <div class="sort_details">
                                          <div class="title_details">
                                              <p>Оборудование</p>
                                          </div>
                                          <select class="select_details" name="equipment" id="" @if(!Route::is('perform')) disabled @endif>
                                            <option value="">{{ Route::is('worker') ? $elem->equipment : 'Не выбрано' }}</option>
                                            @if(Route::is('perform'))
                                              @foreach($equipment as $e)
                                              <option value="{{ $e->name }}">{{ $e->name }}</option>
                                              @endforeach
                                            @endif
                                          </select>
                                      </div>
                                  </div>

                                  <div class="wrap_details wrap_comment">
                                      <div class="title_details">
                                          <p>Комментарий</p>
                                      </div>
                                      <textarea class="comment" name="comment" id="" cols="100" rows="7" @if(Route::is('masterCompleted')) disabled @endif>{{ $elem->comment }}</textarea>
                                      <a href="{{Route::is('worker') ? route('commentWorker', ['session' => $session_id, 'task' => $elem->id]) : route('commentMaster', ['session' => $session_id, 'task' => $elem->id])}}" class="{{Route::is('masterCompleted') ? 'Hide' : ''}}"><button type="submit" class="btn btn-primary btn_group_sch" name="save">Сохранить</button></a>
                                  </div>
                              </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="overlay js-overlay-modal"></div>
            <!-- The Modal -->
            <div class="modal fade" data-modal="2">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content underModal">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Укажите прогресс выполнения приостановленной операции</h4>
                            <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="progress_op">
                                <div class="title_progress_op">
                                    <p class="p_progress_title">Прогресс выполнения, %</p>
                                </div>
                                <form class="suspForm" action="" method="post">
                                  @csrf
                                  <div class="input_progress">
                                      <input class="in_progress_op" type="number" min="0" max="100" name="changeProgress" required>
                                  </div>
                                  <div class="btn_progress_group">
                                      <button type="button" class="btn btn-danger closeProgress">Отменить</button>
                                        <a class="Suspend" href=""><button class="btn btn-primary Suspend" id="Suspend">Приостановить</button></a>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  <div class="overlay2 js-overlay2-modal"></div>
                </div>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="/public/js/scriptModal1.js"></script>
