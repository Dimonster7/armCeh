<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderingsTable extends Migration
{
    //protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');//при удалении сессии, удаляются все её задачи
            $table->string('order_name');
            $table->string('cipher_dse');
            $table->integer('cipher');
            $table->integer('count_dse');
            $table->string('name_of_machine');
            $table->string('type_of_specification');
            $table->integer('operation_number');
            $table->dateTime('operation_start_dateTime');
            $table->dateTime('operation_end_dateTime');
            $table->timestamps();
            //$table->foreign('order_number')->references('order_number')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordering');
    }
}
