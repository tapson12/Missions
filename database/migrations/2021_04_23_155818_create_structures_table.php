<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->bigInteger('type_structure_id');
           $table->string('libellestructure', 255);
           $table->boolean('type')->nullable()->default(false);
           $table->string('profil', 255)->nullable()->default('text');
           $table->foreign('type_structure_id')->references('id')->on('type_structures')->onDelete('cascade');
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
        Schema::dropIfExists('structures');
    }
}
