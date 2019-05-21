<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurriculumVitaeVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitae_vacancies', function (Blueprint $table) {
            $table->bigInteger('cv_id')
                ->unsigned();

            $table->foreign('cv_id')->references('id')
                ->on('curriculum_vitaes')
                ->onDelete('cascade');

            $table->bigInteger('vacancies_id')
                ->unsigned();

            $table->foreign('vacancies_id')->references('id')
                ->on('vacancies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_vitae_vacancies');
    }
}
