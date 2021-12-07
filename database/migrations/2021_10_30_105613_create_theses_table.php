<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->id('id_these');
            $table->string('auteur')->nullable();
            $table->text('titre')->nullable();
            $table->string('directeur')->nullable();
            $table->string('directeur_np')->nullable();
            $table->string('id_directeur')->nullable();
            $table->string('etablissement_soutenance')->nullable();
            $table->string('id_etablissement')->nullable();
            $table->string('discipline')->nullable();
            $table->string('statut')->nullable();
            $table->date('date_premiere_inscription')->nullable();
            $table->date('date_soutenance')->nullable();
            $table->string('langue')->nullable();
            $table->string('accessible_online')->nullable();
            $table->date('publi_thesesfr')->nullable();
            $table->date('maj_thesesfr')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
