<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRemindersTable extends Migration
{
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_fk_4818105')->references('id')->on('bookings');
        });
    }
}
