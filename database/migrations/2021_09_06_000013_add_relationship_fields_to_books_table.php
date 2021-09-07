<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_4813905')->references('id')->on('categories');
            $table->unsignedBigInteger('binding_id');
            $table->foreign('binding_id', 'binding_fk_4813906')->references('id')->on('bindings');
            $table->unsignedBigInteger('shelf_id');
            $table->foreign('shelf_id', 'shelf_fk_4814009')->references('id')->on('shelves');
        });
    }
}
