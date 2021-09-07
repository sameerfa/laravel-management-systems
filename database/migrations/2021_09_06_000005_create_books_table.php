<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn')->unique();
            $table->string('book_title');
            $table->longText('summary')->nullable();
            $table->string('author_name');
            $table->date('published_date');
            $table->integer('total_copies')->nullable();
            $table->string('available_copies');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
