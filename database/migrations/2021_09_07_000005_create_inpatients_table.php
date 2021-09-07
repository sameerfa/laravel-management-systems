<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInpatientsTable extends Migration
{
    public function up()
    {
        Schema::create('inpatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('admission_date');
            $table->date('discharge_date');
            $table->decimal('advance', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
