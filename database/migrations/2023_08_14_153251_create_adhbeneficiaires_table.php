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
        Schema::create('adhbeneficiaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adhtuteur_id');
            $table->foreignId('parente_id');
            $table->string('adhbname',20);
            $table->string('adhbnamelast',60);
            $table->enum('adhbsexe',[0,1])->default(1);
            $table->date('adhbdatenais');
            $table->string('adhblieunais',50);
            $table->string('adhbphone1',15);
            $table->string('adhbphone2',15);
            $table->foreignId('pidentite_id')->default(1);
            $table->string('adhbpnumero',25);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('adhtuteur_id')->references('adhtuteur_id')->on('adhtuteurs');
            $table->foreign('parente_id')->references('parente_id')->on('parentes');
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
        Schema::dropIfExists('adhbeneficiaires');
    }
};
