<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('borrowed_from');
            $table->date('borrowed_to');
            $table->date('return_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
