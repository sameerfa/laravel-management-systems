<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInpatientsTable extends Migration
{
    public function up()
    {
        Schema::table('inpatients', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_fk_4818598')->references('id')->on('rooms');
            $table->unsignedBigInteger('lab_id');
            $table->foreign('lab_id', 'lab_fk_4818556')->references('id')->on('labs');
        });
    }
}
