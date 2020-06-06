<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionOptionGroupPivotTable extends Migration
{
    public function up()
    {
        Schema::create('option_option_group', function (Blueprint $table) {
            $table->unsignedInteger('option_id');
            $table->foreign('option_id', 'option_id_fk_1600799')->references('id')->on('options')->onDelete('cascade');
            $table->unsignedInteger('option_group_id');
            $table->foreign('option_group_id', 'option_group_id_fk_1600799')->references('id')->on('option_groups')->onDelete('cascade');
        });
    }
}
