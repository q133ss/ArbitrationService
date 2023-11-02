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
        Schema::create('numbers_calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('number_id')->comment('На какой номер звонок');
            $table->string('number_from')->comment('От кого звонок');
            $table->integer('duration')->nullable();

            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->date('date')->nullable()->comment('На какую дату договорились');
            $table->time('time')->nullable()->comment('На какую дату договорились');

            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numbers_calls');
    }
};
