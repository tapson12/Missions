<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->bigInteger('type_agent_id');
            $table->string('nom');
            $table->string('prenom', 255)->default('text');
            $table->string('matricule', 255)->default('text');
            $table->date('datenaissance')->nullable();
            $table->string('contact', 100)->nullable()->default('text');
            $table->string('sexe', 100)->nullable()->default('text');
            $table->string('situationmatrimoniale', 100)->nullable()->default('text');
            $table->string('distinction', 255)->nullable()->default('text');
            $table->boolean('agentactive')->nullable()->default(true);
            $table->boolean('agentexterne')->nullable()->default(false);
            $table->string("created_by");
            $table->string("update_by");
            $table->foreign('type_agent_id')->references('id')->on('type_agents')->onDelete('cascade');
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
        Schema::dropIfExists('agents');
    }
}
