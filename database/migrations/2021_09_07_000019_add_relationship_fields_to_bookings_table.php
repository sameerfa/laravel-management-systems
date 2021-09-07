<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_fk_4818036')->references('id')->on('rooms');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_4818037')->references('id')->on('customers');
        });
    }
}
