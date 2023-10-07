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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('except');
            $table->text('description');
            $table->json('for_partner')->comment('Преимущества данного оффера для партнера');
            $table->json('for_client')->comment('Преимущества для клиента');
            $table->json('distinctive')->comment('Отличительные особенности');
            $table->string('hold');
            $table->string('vector')->comment('Направление');
            $table->text('target')->comment('Цель, например "Покупка дороже 1000 руб, заказ услуги"');
            $table->double('price')->comment('Цена за лид');
            $table->foreignId('advertiser_id')->comment('Рекламодатель');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
