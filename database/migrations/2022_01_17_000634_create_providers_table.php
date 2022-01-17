<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->nullable()->unique();
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('addresse_physique')->nullable();
            $table->string('type_pe')->nullable();
            $table->string('raison_social')->nullable();
            $table->string('address_commande')->nullable();
            $table->string('address_facture')->nullable();
            $table->string('statut_juridique')->nullable();
            $table->year('annee_creation')->nullable();
            $table->string('registre_commerce')->nullable();
            $table->integer('capital_social')->nullable();
            $table->integer('chiffre_affaire')->nullable();
            $table->integer('note_fournisseur')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
