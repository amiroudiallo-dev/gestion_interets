<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->string('ifu');
            $table->string('rccm');
            $table->string('tel');
            $table->timestamp('date_heure');
            $table->foreignId('observation_id')->nullable()->constrained('observations')->nullOnDelete();
            $table->foreignId('domaine_id')->nullable()->constrained('domains')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyses');
    }
}
