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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('duration')->after('description');
            $table->string('instructor')->after('duration');
            $table->decimal('price', 8, 2)->after('instructor');
            $table->string('category')->after('price');
            $table->string('level')->after('category');
            $table->text('syllabus')->after('level');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
