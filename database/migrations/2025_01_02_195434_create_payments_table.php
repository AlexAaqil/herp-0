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
            $table->string('title', 100);
            $table->string('reference_number', 100)->unique;
            $table->string('payment_method')->default('cheque');
            $table->integer('amount');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->string('year');
            $table->unsignedTinyInteger('term');
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
