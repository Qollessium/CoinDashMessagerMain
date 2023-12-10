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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('crypto_id')->nullable();
            $table
                ->foreign('crypto_id')
                ->references('id')
                ->on('cryptos')
                ->cascadeOnDelete('set null');

            $table->string('interval')->nullable();
            $table->string('current_price')->nullable();
            $table->string('high_24h')->nullable();
            $table->string('low_24h')->nullable();
            $table->string('price_change_24h')->nullable();
            $table->string('price_change_percentage_24h')->nullable();
            $table->string('price_change_percentage_1h_in_currency')->nullable();
            $table->string('price_change_percentage_24h_in_currency')->nullable();
            $table->string('price_change_percentage_7d_in_currency')->nullable();
            $table->dateTime('last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
