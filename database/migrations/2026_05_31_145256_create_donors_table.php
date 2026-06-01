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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob'); // জন্ম তারিখ
            $table->string('blood_group', 5); // A+, O-, AB+ ইত্যাদি
            $table->string('phone')->unique(); // ইউনিক মোবাইল নম্বর
            $table->integer('weight'); // ওজন (কেজি)
            $table->string('district'); // জেলা (Dhaka, Chattogram ইত্যাদি)
            $table->string('location'); // এরিয়া বা নির্দিষ্ট ঠিকানা
            $table->date('last_donation')->nullable(); // শেষ রক্তদানের তারিখ (প্রথমবার হলে ফর্মে ফাঁকা থাকবে, তাই nullable)
            $table->string('email')->nullable()->unique(); // ইমেইল (ঐচ্ছিক, তাই nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
