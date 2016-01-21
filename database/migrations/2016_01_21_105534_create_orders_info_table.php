<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_info', function(Blueprint $table) {
           $table->increments('id');
            $table->integer('order_id');
            $table->string('email');
            $table->string('name');
            $table->string('number');
            $table->string('scara');
            $table->string('apartment');
            $table->string('city');
            $table->string('country');
            $table->string('message');
            $table->string('phone');
            $table->string('street');
            $table->string('bloc');
            $table->string('floor');
            $table->string('interphone');
            $table->string('county');
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
        //
    }
}
