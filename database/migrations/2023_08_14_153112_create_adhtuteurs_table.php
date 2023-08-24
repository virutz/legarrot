<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adhtuteurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercice_id');
            $table->foreignId('section_id');
            $table->date('adhtdatedebut');
            $table->string('adhtname',20);
            $table->string('adhtnamelast',60);
            $table->enum('adhtsexe',[0,1])->default(1);
            $table->date('adhtdatenais');
            $table->string('adhtlieunais',50);
            $table->foreignId('matrimoniale_id')->default(1);
            $table->string('adhprofname',60);
            $table->string('adhtemail',50);
            $table->string('adhtadresse',50);
            $table->string('adhtphone1',15);
            $table->string('adhtphone2',15);
            $table->foreignId('pidentite_id')->default(1);
            $table->string('adhtpnumero',25);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('exercice_id')->references('exercice_id')->on('exercices');
            $table->foreign('section_id')->references('section_id')->on('sections');
            $table->foreign('matrimoniale_id')->references('matrimoniale_id')->on('matrimoniales');
            $table->foreign('pidentite_id')->references('pidentite_id')->on('pidentites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adhtuteurs');
    }
};
