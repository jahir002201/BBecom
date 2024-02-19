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
            $table->string('order_id')->unique();
            $table->string('name');
            $table->string('number');
            $table->string('email')->nullable();
            $table->string('address');
            $table->bigInteger('shipping_id');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->longText('message')->nullable();
            $table->enum('status',['pending','processing','shipping','return','cancel','damage','delieverd']);
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
