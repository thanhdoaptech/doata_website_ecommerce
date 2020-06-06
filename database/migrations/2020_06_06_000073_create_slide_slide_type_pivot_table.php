<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideSlideTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('slide_slide_type', function (Blueprint $table) {
            $table->unsignedInteger('slide_id');
            $table->foreign('slide_id', 'slide_id_fk_1600823')->references('id')->on('slides')->onDelete('cascade');
            $table->unsignedInteger('slide_type_id');
            $table->foreign('slide_type_id', 'slide_type_id_fk_1600823')->references('id')->on('slide_types')->onDelete('cascade');
        });
    }
}
