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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->enum('status', ['hold', 'work', 'cancel', 'accept'])->default('hold');
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->date('date')->nullable()->comment('На какую дату договорились');
            $table->time('time')->nullable()->comment('На какую дату договорились');
            $table->double('price')->default(0);
            $table->foreignId('offer_id');
            $table->foreignId('master_id');
            $table->boolean('from_form')->default(false)->comment('Добавленно из формы');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
