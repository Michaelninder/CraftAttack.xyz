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
        Schema::create('clip_user_likes', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->uuid('clip_id');
            $table->timestamps();

            $table->primary(['user_id', 'clip_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('clip_id')
                ->references('id')
                ->on('clips')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clip_user_likes');
    }
};
