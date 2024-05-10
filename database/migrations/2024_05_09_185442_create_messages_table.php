<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id'); // ID of the group where the message was sent
            $table->unsignedBigInteger('user_id');  // ID of the user who sent the message

            $table->unsignedBigInteger('from');     // This should be an ID, not a string
            $table->string('name');                 // Name of the user who sent the message
            $table->boolean('is_read')->default(false); // Boolean for read status, with a default of 'false'
            $table->longText('message');            // The content of the message

            $table->timestamps();  // Automatically add created_at and updated_at

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
