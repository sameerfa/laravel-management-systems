<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTablesTable extends Migration
{
    public function up()
    {
        Schema::create('item_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('cost', 15, 2);
            $table->string('details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
