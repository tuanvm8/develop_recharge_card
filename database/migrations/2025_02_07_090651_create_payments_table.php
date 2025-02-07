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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('contact_info');
            $table->string('transaction_type');
            $table->string('name_card');
            $table->integer('quantity');
            $table->decimal('card_value', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->string('vnp_TxnRef')->unique();
            $table->integer('status')->default(1)->index(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
