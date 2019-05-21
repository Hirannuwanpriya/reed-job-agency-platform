<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_administrators', function (Blueprint $table) {
            $table->bigInteger('activity_id')
                ->unsigned();

            $table->foreign('activity_id')->references('id')
                ->on('activities')
                ->onDelete('cascade');

            $table->bigInteger('admin_id')
                ->unsigned();

            $table->foreign('admin_id')->references('id')
                ->on('administrators')
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
        Schema::dropIfExists('activity_administrators');
    }
}
