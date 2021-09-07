<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('age')->nullable();
            $table->integer('weight')->nullable();
            $table->string('gender')->nullable();
            $table->longText('address')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('disease')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
