<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_internes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('agent_id');
            $table->bigInteger('lieumission_id');
            $table->bigInteger('vehicule_id');
            $table->string('objet');

            $table->date('datedepart')->nullable();
            $table->date('dateretour')->nullable();
            $table->string('qrcode');
            $table->boolean('active')->nullable()->default(true);
            $table->boolean('incidencefinanciere')->nullable()->default(false);

            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->foreign('lieumission_id')->references('id')->on('lieu_missions')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->string('hebergement');
            
            $table->string('omprofilsignataire1', 255)->nullable()->default('text');
            $table->string('omagentsignataire1', 255)->nullable()->default('text');
            $table->string('omdistinctionsignataire1', 255)->nullable()->default('text');
            $table->string('omprofilsignataire2', 255)->nullable()->default('text');
            $table->string('omagentsignataire2', 255)->nullable()->default('text');
            $table->string('omdistinctionsignataire2', 255)->nullable()->default('text');
            
            $table->string('logement');
            $table->string("created_by");
            $table->string("update_by");
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
        Schema::dropIfExists('mission_internes');
    }
}
