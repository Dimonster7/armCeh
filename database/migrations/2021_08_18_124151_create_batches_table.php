<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id')->unsigned();
            $table->foreign('session_id')->on('sessions')->onDelete('cascade');//при удалении сессии, удаляются все её задачи
            // $table->bigInteger('session_id')->unsigned()->nullable();
            // $table->foreign('session_id')->on('sessions')->onDelete('set null');//при удалении сессии, session_id будет null
            $table->string('batch');
            $table->integer('route_list');
            $table->integer('cipher');
            $table->integer('batch_count');
            $table->string('order');
            $table->dateTime('start_dateTime');
            $table->dateTime('end_dateTime');
            $table->string('status');
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
        Schema::dropIfExists('batch');
    }
}
