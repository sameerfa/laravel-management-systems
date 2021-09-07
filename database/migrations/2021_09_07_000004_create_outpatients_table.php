<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutpatientsTable extends Migration
{
    public function up()
    {
        Schema::create('outpatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
