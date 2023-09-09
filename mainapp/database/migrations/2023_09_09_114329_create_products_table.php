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
            $table->string('title');
            $table->longText('body');
            $table->integer('price');
            $table->string('phonenumber');
            $table->timestamps();
            $table->boolean('status')->default(0);
            // id from locations table
            $table->foreignId('location_id')->constrained();
            // id from users table
            $table->foreignId('user_id')->constrained()->onDelte('cascade');
            // id from categorys table
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
