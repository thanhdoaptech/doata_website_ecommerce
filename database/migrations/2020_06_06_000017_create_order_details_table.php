<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('quanity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
