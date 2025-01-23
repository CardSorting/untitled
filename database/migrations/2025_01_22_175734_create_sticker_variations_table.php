<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sticker_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sticker_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->unsignedTinyInteger('variation_index');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sticker_variations');
    }
};
