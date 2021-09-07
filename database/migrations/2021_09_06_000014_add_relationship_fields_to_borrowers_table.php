<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBorrowersTable extends Migration
{
    public function up()
    {
        Schema::table('borrowers', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_4814016')->references('id')->on('students');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id', 'book_fk_4814017')->references('id')->on('books');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4814021')->references('id')->on('users');
        });
    }
}
