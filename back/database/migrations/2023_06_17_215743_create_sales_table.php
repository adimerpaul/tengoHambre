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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('total', 10, 2)->default(0);
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('type')->default('Ingreso');
            $table->string('description')->nullable();
            $table->string('canceled')->default('No');
            $table->string('canceledBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
