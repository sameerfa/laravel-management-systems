<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabsTable extends Migration
{
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lab_number');
            $table->integer('weight')->nullable();
            $table->date('date')->nullable();
            $table->string('category')->nullable();
            $table->string('patient_type')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
