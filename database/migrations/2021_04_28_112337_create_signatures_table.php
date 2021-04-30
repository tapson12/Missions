<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('structure_id');
            $table->string('signature_1');
            $table->string('signature_2');
            $table->string('distinction_signataire_1');
            $table->string('distinction_signataire_2');
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
            $table->string('created_by');
            $table->string('update_by');

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
        Schema::dropIfExists('signatures');
    }
}
