<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_vacancies', function (Blueprint $table) {
            $table->bigInteger('company_id')
                ->unsigned();

            $table->foreign('company_id')->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->bigInteger('vacancy_id')
                ->unsigned();

            $table->foreign('vacancy_id')->references('id')
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
        Schema::dropIfExists('company_vacancies');
    }
}
