<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionProductOptionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('option_product_option', function (Blueprint $table) {
            $table->unsignedInteger('product_option_id');
            $table->foreign('product_option_id', 'product_option_id_fk_1600788')->references('id')->on('product_options')->onDelete('cascade');
            $table->unsignedInteger('option_id');
            $table->foreign('option_id', 'option_id_fk_1600788')->references('id')->on('options')->onDelete('cascade');
        });
    }
}
