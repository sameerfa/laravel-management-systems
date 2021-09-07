<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_name');
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('employee_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
