<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_type');
            $table->longText('description')->nullable();
            $table->decimal('cost', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
