<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('icon')->default('🏆');
            $table->integer('points')->default(10);
            $table->enum('type', ['sessions', 'rating', 'streak', 'special'])->default('sessions');
            $table->integer('requirement')->nullable();
            $table->timestamps();
        });

        Schema::create('user_achievement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('achievement_id')->constrained()->onDelete('cascade');
            $table->timestamp('unlocked_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_achievement');
        Schema::dropIfExists('achievements');
    }
};
