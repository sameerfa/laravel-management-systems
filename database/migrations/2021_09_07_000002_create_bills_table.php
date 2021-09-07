<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_type')->nullable();
            $table->decimal('doctor_charge', 15, 2)->nullable();
            $table->decimal('medicine_charge', 15, 2)->nullable();
            $table->decimal('room_charge', 15, 2)->nullable();
            $table->decimal('operation_charge', 15, 2)->nullable();
            $table->integer('no_of_days')->nullable();
            $table->decimal('nursing_charge', 15, 2)->nullable();
            $table->decimal('advance', 15, 2)->nullable();
            $table->string('health_card')->nullable();
            $table->decimal('lab_charge', 15, 2)->nullable();
            $table->integer('bill')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
