<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentMissionInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_mission_internes', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->bigInteger('mission_interne_id');
           $table->bigInteger('agent_id');
           $table->foreign('mission_interne_id')->references('id')->on('mission_internes')->onDelete('cascade');
           $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
           
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_mission_internes');
    }
}
