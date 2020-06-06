<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderOrderDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('order_order_detail', function (Blueprint $table) {
            $table->unsignedInteger('order_detail_id');
            $table->foreign('order_detail_id', 'order_detail_id_fk_1600772')->references('id')->on('order_details')->onDelete('cascade');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_1600772')->references('id')->on('orders')->onDelete('cascade');
        });
    }
}
