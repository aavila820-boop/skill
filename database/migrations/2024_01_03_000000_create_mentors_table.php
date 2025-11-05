<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('faculty_id')->nullable()->constrained(); // ✅ NULLABLE
            $table->string('program');
            $table->text('bio')->nullable();
            $table->boolean('available')->default(true);
            $table->decimal('average_rating', 3, 2)->default(0);
            $table->integer('total_sessions')->default(0);
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->foreignId('faculty_id')->nullable()->constrained(); // ✅ NULLABLE
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('mentor_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'completed', 'dropped'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_subject');
        Schema::dropIfExists('mentor_subject');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('mentors');
    }
};
