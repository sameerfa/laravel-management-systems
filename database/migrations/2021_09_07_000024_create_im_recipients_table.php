<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImRecipientsTable extends Migration
{
    public function up()
    {
        Schema::create('im_recipients', function (Blueprint $table) {
            $table->foreignId('conversation_id')->constrained('im_conversations')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamp('seen_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('im_participants');
    }
}
