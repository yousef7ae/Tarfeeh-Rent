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
        Schema::create('reservation_waitings', function (Blueprint $table) {
            $table->id();
            $table->date('date_reservation')->nullable();
            $table->time('time_reservation')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('product_id')->nullable()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('user_buyer_id')->nullable()->index();
            $table->foreign('user_buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_owner_id')->nullable()->index();
            $table->foreign('user_owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_waitings');
    }
};
