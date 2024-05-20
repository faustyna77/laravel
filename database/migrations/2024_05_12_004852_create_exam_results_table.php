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
        Schema::create('exam_results', function (Blueprint $table) {
            $table->bigIncrements('result_id'); // Nadanie własnej nazwy dla klucza głównego
            $table->unsignedBigInteger('student_id'); // Powiązanie z kluczem głównym Students
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->string('exam_name');
            $table->date('exam_date');
            $table->string('subject');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
