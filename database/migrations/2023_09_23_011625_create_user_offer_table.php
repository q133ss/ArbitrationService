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
        Schema::create('user_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('offer_id');
            $table->enum('approved', ['wait', 'approved', 'canceled'])->default('wait');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_offer');
    }
};
