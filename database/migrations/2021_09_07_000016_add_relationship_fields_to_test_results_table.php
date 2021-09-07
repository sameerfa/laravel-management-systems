<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestResultsTable extends Migration
{
    public function up()
    {
        Schema::table('test_results', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id')->nullable();
            $table->foreign('test_id', 'test_fk_4819157')->references('id')->on('tests');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_4819158')->references('id')->on('users');
        });
    }
}
