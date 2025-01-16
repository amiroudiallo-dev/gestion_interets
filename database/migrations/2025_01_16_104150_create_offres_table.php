<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('denomination'); // Dénomination
            $table->string('ifu_number'); // Numéro IFU
            $table->string('rccm_number'); // Numéro RCCM
            $table->string('nature_of_activity'); // Nature de l'activité
            $table->string('contact_info'); // Informations de contact
            $table->date('deposit_date'); // Date de dépôt
            $table->integer('envelope_number'); // Numéro d'enveloppe
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
}
