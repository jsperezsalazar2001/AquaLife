<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedDecimal('subtotal', 19, 4);
            $table->bigInteger('fish_id')->unsigned();
            $table->foreign('fish_id')->references('id')->on('fish');
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('accessory_orders');
    }
}
