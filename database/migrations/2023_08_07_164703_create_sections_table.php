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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name',30)->unique();
            $table->string('nameabrv',3)->unique();
            $table->foreignId('region_id');
            $table->string('phone1',15);
            $table->string('phone2',15);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('region_id')->references('region_id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
