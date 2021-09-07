<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('test_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_correct')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
