<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrmNotesTable extends Migration
{
    public function up()
    {
        Schema::table('crm_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_4818882')->references('id')->on('crm_customers');
        });
    }
}
