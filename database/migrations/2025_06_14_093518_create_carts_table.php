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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('userable_id')->on('customers')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            // Polymorphic user
            $table->nullableMorphs('userable'); // creates userable_id and userable_type
            
            $table->bigInteger('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};