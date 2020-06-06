<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('order_detail_product', function (Blueprint $table) {
            $table->unsignedInteger('order_detail_id');
            $table->foreign('order_detail_id', 'order_detail_id_fk_1600773')->references('id')->on('order_details')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_1600773')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
