<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('location_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_1600572')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('location_id');
            $table->foreign('location_id', 'location_id_fk_1600572')->references('id')->on('locations')->onDelete('cascade');
        });
    }
}
