<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmNotesTable extends Migration
{
    public function up()
    {
        Schema::create('crm_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('note');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
