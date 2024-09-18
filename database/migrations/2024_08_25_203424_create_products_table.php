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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('head_photo')->nullable();
            $table->string('head_photo_back')->nullable();
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->string('store')->default('Khadijah Store');
            $table->string('discount')->nullable(); // opsional
            $table->json('media')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('categories_id')->constrained()->onDelete('set null');
            $table->foreignId('labels_id')->constrained()->onDelete('set null');
            $table->text('description')->nullable();
            $table->text('link')->nullable();
            $table->bigInteger('views')->default('0');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
