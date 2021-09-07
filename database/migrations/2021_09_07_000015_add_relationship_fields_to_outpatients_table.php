<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutpatientsTable extends Migration
{
    public function up()
    {
        Schema::table('outpatients', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id', 'patient_fk_4818567')->references('id')->on('patients');
            $table->unsignedBigInteger('lab_id')->nullable();
            $table->foreign('lab_id', 'lab_fk_4818569')->references('id')->on('labs');
        });
    }
}
