<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->longText('brief');
            $table->decimal('hourly_rate', 15, 2);
            $table->integer('total_hours');
            $table->integer('estimated_hours')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
