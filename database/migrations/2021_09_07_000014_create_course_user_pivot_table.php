<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_4819115')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4819115')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
