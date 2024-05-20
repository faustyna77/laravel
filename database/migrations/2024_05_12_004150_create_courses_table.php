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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id'); // Nadanie własnej nazwy dla klucza głównego
            $table->string('course_name');
            $table->text('course_description')->nullable();
            $table->unsignedBigInteger('instructor_id'); // Powiązanie z kluczem głównym Students
            $table->foreign('instructor_id')->references('student_id')->on('students');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
