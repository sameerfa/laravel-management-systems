<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('amount');
            $table->string('payment_type');
            $table->string('payment_details')->nullable();
            $table->date('payment_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
