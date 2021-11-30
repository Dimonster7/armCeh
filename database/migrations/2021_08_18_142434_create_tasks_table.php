<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');//при удалении сессии, удаляются все её задачи
            // $table->bigInteger('session_id')->unsigned()->nullable();
            // $table->foreign('session_id')->on('sessions')->onDelete('set null');//при удалении сессии, session_id будет null
            $table->string('department');->nullable();
            $table->integer('client_id_routelist');
            $table->integer('route_list');
            $table->string('order_name');
            $table->string('name_of_machine');
            $table->string('name_dse');
            $table->string('cipher_dse');->nullable();
            $table->integer('cipher');->nullable();
            $table->integer('batch_count');
            $table->integer('operation_number');
            $table->string('operation_name');
            $table->integer('progress');
            $table->string('performer');
            $table->string('equipment');
            $table->dateTime('start_dateTime');->nullable();
            $table->dateTime('end_dateTime');->nullable();
            $table->string('status');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
