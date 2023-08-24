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
        Schema::create('cotisationadhs', function (Blueprint $table) {
            $table->id();
            $table->string('name',11);
            $table->foreignId('exercice_id')->unique();
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('exercice_id')->references('exercice_id')->on('exercices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotisationadhs');
    }
};
