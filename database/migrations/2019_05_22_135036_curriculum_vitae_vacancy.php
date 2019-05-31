<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurriculumVitaeVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitae_vacancy', function (Blueprint $table) {
            $table->bigInteger('vacancy_id')
                ->unsigned();
        
            $table->foreign('vacancy_id')->references('id')
                ->on('vacancies')
                ->onDelete('cascade');
            
            $table->bigInteger('curriculum_vitae_id')
                ->unsigned();
    
            $table->foreign('curriculum_vitae_id')->references('id')
                ->on('curriculum_vitaes')
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
        Schema::dropIfExists('curriculum_vitae_vacancy');
    }
    
}
