<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('expense_type');
            $table->string('description')->nullable();
            $table->integer('amount');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
