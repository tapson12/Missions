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

            $table->bigInteger('structure_id');
            $table->bigInteger('lieumission_id');

            $table->bigInteger('timbre_id');

            $table->bigInteger('vehicule_id');
            $table->string('objet');

            $table->date('datedepart')->nullable();
            $table->date('dateretour')->nullable();
            $table->string('qrcode');
            $table->string('reference');
            $table->boolean('active')->nullable()->default(true);
            $table->boolean('incidencefinanciere')->nullable()->default(false);

            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('lieumission_id')->references('id')->on('lieu_missions')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('hebergement');
            $table->string('logement');
            $table->string('omprofilsignataire1', 255)->nullable()->default('text');
            $table->string('omagentsignataire1', 255)->nullable()->default('text');
            $table->string('omdistinctionsignataire1', 255)->nullable()->default('text');
            $table->string('omprofilsignataire2', 255)->nullable()->default('text');
            $table->string('omagentsignataire2', 255)->nullable()->default('text');
            $table->string('omdistinctionsignataire2', 255)->nullable()->default('text');
            $table->string('chefmission', 255);
            $table->string('chauffeurmission', 255);

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
