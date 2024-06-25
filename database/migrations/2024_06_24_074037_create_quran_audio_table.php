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
        Schema::create('quran_audio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reciter_id')->references('id')->on('reciters');
            $table->string('sura');
            $table->integer('sura_number');
            $table->integer('verses_number');
            $table->string('description')->nullable();
            $table->string('revealed_at');
            $table->string('audio_url');
            $table->string('audio_duration');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_audio');
    }
};
