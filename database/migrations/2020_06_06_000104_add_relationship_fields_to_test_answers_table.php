<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('test_answers', function (Blueprint $table) {
            $table->unsignedInteger('test_result_id');
            $table->foreign('test_result_id', 'test_result_fk_1599890')->references('id')->on('test_results');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_fk_1599891')->references('id')->on('questions');
            $table->unsignedInteger('option_id');
            $table->foreign('option_id', 'option_fk_1599892')->references('id')->on('question_options');
        });
    }
}
