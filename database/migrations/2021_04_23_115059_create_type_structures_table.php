<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_structures', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string("libellestructure");
            $table->string("niveau");
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
        Schema::dropIfExists('type_structures');
    }
}
