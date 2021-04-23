<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsabiliteAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilite_agents', function (Blueprint $table) {
            $table->bigIncrements('id');         
            $table->bigInteger('agent_id');        
            $table->bigInteger('responsabilite_id')->nullable()->default(12);        
            $table->date('datedebut')->nullable();  
            $table->date('datefin')->nullable();           
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');       
            $table->foreign('responsabilite_id')->references('id')->on('responsabilites')->onDelete('cascade');
            $table->string("created_by");
            $table->string("update_by");
            $table->boolean('activer')->nullable()->default(false);
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
        Schema::dropIfExists('responsabilite_agents');
    }
}
