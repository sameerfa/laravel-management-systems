<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('short_text')->nullable();
            $table->longText('long_text')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('is_published')->default(0)->nullable();
            $table->boolean('is_free')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
