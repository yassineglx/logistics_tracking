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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('receiver');
            $table->string('tracking_number')->unique();
            $table->enum('status', ['Pending', 'In-Transit', 'Delivered'])->default('Pending');
            $table->text('description')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamps();

            
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
