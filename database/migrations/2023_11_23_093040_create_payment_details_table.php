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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method'); 
            $table->string('card_number', 19)->nullable(); 
            $table->string('expiration_date', 5)->nullable(); 
            $table->string('ccv', 4)->nullable(); 
            $table->string('surname')->nullable(); 
            $table->string('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
