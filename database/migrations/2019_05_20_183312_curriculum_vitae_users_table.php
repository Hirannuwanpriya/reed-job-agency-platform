<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurriculumVitaeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitae_users', function (Blueprint $table) {
            $table->bigInteger('cv_id')
                ->unsigned();

            $table->foreign('cv_id')->references('id')
                ->on('curriculum_vitaes')
                ->onDelete('cascade');

            $table->bigInteger('user_id')
                ->unsigned();

            $table->foreign('user_id')->references('id')
                ->on('users')
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
        Schema::dropIfExists('curriculum_vitae_users');
    }
}
