<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->decimal('price', 15, 2)->nullable();
            $table->boolean('is_published')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
