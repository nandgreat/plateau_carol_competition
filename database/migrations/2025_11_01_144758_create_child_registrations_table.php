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
        Schema::create('child_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code');
            $table->string('fullname');
            $table->string('organization')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->string('qr_code_path')->nullable();
            $table->string('child_image_path')->nullable();
            $table->string('birth_certificate_path')->nullable();
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('parent_email');
            $table->enum('lga', ['Jos North', 'Jos South']);
            $table->enum('interest_area', ['Quiz', 'Bible Recitation']);
            $table->enum('stage', ['Initial', 'First Stage', 'Semi Final', 'Final', 'Winner'])->default('Initial');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_registrations');
    }
};
