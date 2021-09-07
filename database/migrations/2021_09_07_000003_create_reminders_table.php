<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reminder_type');
            $table->string('reminder_detail')->nullable();
            $table->datetime('datetime');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
