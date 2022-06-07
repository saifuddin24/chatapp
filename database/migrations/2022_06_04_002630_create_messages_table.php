<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')->cascadeOnUpdate();

            $table->text('text')->nullable();

            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')
                ->references('id')
                ->on('conversations')->cascadeOnUpdate();

            $table->enum('message_type', ['message','attachment','information','warning'])
                ->nullable()->comment("message','attachment','information','warning");
            $table->unsignedTinyInteger('message_attachment_type')->nullable();
            $table->timestamps();
            $table->index([ 'owner_id', 'conversation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
