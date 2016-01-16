<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProductSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->boolean('featured')->default(false);
            $table->boolean('promotion')->default(false);
            $table->boolean('stock')->default(false);
            $table->boolean('outlet')->default(false);
            $table->boolean('designer_edition')->default(false);

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
        Schema::drop('product_settings');
    }
}
