<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('im_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('im_conversations')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('im_messages');
    }
}
