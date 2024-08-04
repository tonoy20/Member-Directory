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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name_bangla');
            $table->string('name_english');
            $table->string('image')->nullable();
            $table->string('upazilla');
            $table->string('profession');
            $table->string('blood_group');
            $table->string('school_name');
            $table->string('gender');
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('fb_url');
            $table->string('reference')->nullable();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('status')->default('pending');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
