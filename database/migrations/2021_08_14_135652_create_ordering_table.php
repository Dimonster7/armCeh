<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderingTable extends Migration
{
    //protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordering', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number');
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
