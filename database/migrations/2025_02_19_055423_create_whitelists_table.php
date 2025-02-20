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
        Schema::create('whitelists', function (Blueprint $table) {
            $table->id();
            $table->string("x_acc");
            $table->string("discord_acc");
            $table->string("telegram_acc");
            $table->string("berachain_add");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whitelists');
    }
};
