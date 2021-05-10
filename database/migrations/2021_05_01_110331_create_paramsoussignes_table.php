<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamsoussignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramsoussignes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('decret', 255)->nullable()->default('text');
            $table->string('soussigne', 255)->nullable()->default('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paramsoussignes');
    }
}
