<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('item_table_id');
            $table->foreign('item_table_id', 'item_table_fk_4818079')->references('id')->on('item_tables');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_fk_4818080')->references('id')->on('bookings');
        });
    }
}
