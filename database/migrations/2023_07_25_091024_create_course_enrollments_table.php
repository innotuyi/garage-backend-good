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
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courseID');
            $table->unsignedBigInteger('studentID');

            $table->foreign('courseID')->references('id')->on('Course')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('studentID')->references('id')->on('users')
                   ->onDelete('restrict')
                   ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }
};
