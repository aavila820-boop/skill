<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mentor_id')->constrained('mentors')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained();
            $table->enum('type', ['presencial', 'virtual'])->default('virtual');
            $table->dateTime('scheduled_at');
            $table->integer('duration')->default(60); // minutes
            $table->enum('status', ['pending', 'confirmed', 'upcoming', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->text('student_notes')->nullable();
            $table->integer('rating')->nullable();
            $table->text('review')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
