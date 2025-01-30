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
        Schema::create('second_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->timestamp('date_heure');
            $table->string('objet');
            $table->foreignId('observation_id')->nullable()->constrained('observations')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('second_registers');
    }
};
