<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->nullable();
            $table->string('ship_name');
            $table->string('ship_address');
            $table->string('ship_address_2')->nullable();
            $table->string('country')->nullable();
            $table->string('city');
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('shipping_status')->nullable();
            $table->string('tax')->nullable();
            $table->string('email')->nullable();
            $table->string('tracking_number')->nullable();
            $table->datetime('date_shipped')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
