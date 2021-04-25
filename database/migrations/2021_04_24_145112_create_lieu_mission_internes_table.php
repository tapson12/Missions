<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieuMissionInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieu_mission_internes', function (Blueprint $table) {
           
           $table->bigIncrements('id');
           
           $table->bigInteger('lieu_mission_id');
           
           $table->bigInteger('mission_interne_id');

           
           $table->foreign('lieu_mission_id')->references('id')->on('lieu_missions')->onDelete('cascade');
           
           $table->foreign('mission_interne_id')->references('id')->on('mission_internes')->onDelete('cascade');
           
           
           
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
        Schema::dropIfExists('lieu_mission_internes');
    }
}
