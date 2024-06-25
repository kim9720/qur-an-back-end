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
        Schema::create('reciters', function (Blueprint $table) {
            $table->id();
            $table->string('reciter_name');
            $table->integer('juzuu_number');
            $table->string('reciter_image')->nullable();
            $table->string('reciter_bio')->nullable();
            $table->string('reciter_email')->nullable();
            $table->string('reciter_phone')->nullable();
            $table->string('reciter_facebook')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reciters');
    }
};
