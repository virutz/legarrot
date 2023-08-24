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
        Schema::create('gerants', function (Blueprint $table) {
            $table->id();
            $table->string('name',15);
            $table->string('namelast',30);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone1',15);
            $table->string('phone2',15);
            $table->foreignId('profile_id');
            $table->foreignId('role_id');
            $table->foreignId('section_id');
            $table->string('pricesms',11)->default(20);
            $table->string('volumesms',11);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
            $table->foreign('profile_id')->references('profile_id')->on('profiles');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('section_id')->references('section_id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerants');
    }
};
