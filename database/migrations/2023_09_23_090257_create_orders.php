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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('menu'); 
            $table->unsignedBigInteger('menu_id');
            $table->string('order_number');
            $table->string('category');  
            $table->integer('quantity');  
            $table->decimal('price', 8, 2);  
            $table->string('image')->nullable(); 
            $table->string('status');
            $table->boolean('is_completed')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
