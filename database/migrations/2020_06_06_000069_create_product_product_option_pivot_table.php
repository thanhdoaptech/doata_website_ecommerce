<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductOptionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_product_option', function (Blueprint $table) {
            $table->unsignedInteger('product_option_id');
            $table->foreign('product_option_id', 'product_option_id_fk_1600787')->references('id')->on('product_options')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_1600787')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
