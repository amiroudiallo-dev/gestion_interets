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
        Schema::create('first_registers', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_heure');
            $table->string('soumissionnaire');
            $table->string('numero_envelop');
            $table->string('tel');
            $table->string('objet');
            $table->foreignId('observation_id')->nullable()->constrained('observations')->nullOnDelete();
            $table->foreignId('domain_id')->nullable()->constrained('domains')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_registers');
    }
};
