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
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brands_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->bigInteger('price');
            $table->bigInteger('selling_price')->nullable();
            $table->string('sku')->nullable();
            $table->integer('qty')->default(0);
            $table->integer('alert_qty')->default(0);
            $table->mediumText('short_detail')->nullable();
            $table->longText('long_detail')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery_image')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('video')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
