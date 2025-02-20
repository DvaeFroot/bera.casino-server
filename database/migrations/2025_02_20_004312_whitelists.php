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
            $table->string('xAcc');
            $table->string('discordAcc');
            $table->string('telegramAcc');
            $table->string('berachainAdd');
            $table->timestamp('createdAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
