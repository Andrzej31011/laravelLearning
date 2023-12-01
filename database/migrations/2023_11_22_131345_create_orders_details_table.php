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
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // Imię i nazwisko
            $table->string('email'); // Email
            $table->string('phone'); // Numer telefonu
            $table->string('city'); // Miasto
            $table->string('street'); // Ulica
            $table->string('house_number'); // Numer domu
            $table->string('apartment_number')->nullable(); // Numer mieszkania (opcjonalnie)
            $table->string('postal_code'); // Kod pocztowy
            $table->string('post_office'); // Poczta
            $table->string('delivery_method'); // Sposób dostawy
            $table->unsignedBigInteger('id_payment_method'); // Metoda płatności
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_details');
    }
};
