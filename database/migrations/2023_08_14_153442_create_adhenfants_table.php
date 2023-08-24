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
        Schema::create('adhenfants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercice_id');
            $table->foreignId('adhtuteur_id');
            $table->date('adhdatedebut');
            $table->string('adhname',20);
            $table->string('adhnamelast',60)->unique();
            $table->enum('adhsexe',[0,1])->default(1);
            $table->date('adhdatenais');
            $table->string('adhlieunais',50);
            $table->string('adhphone1',15);
            $table->string('adhphone2',15);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('exercice_id')->references('exercice_id')->on('exercices');
            $table->foreign('adhtuteur_id')->references('adhtuteur_id')->on('adhtuteurs');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adhenfants');
    }
};
