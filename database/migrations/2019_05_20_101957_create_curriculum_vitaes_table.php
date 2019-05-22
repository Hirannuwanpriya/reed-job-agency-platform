<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumVitaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitaes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                ->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('proficiency')->nullable();
            $table->integer('experience')->nullable();
            $table->string('edu_level')->nullable();
            $table->string('pro_qualification')->nullable();
            $table->string('skill')->nullable();
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
        Schema::dropIfExists('curriculum_vitaes');
    }
}
