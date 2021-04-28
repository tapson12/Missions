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
            $table->bigInteger('signature_1_id');
            $table->bigInteger('signature_2_id');
            $table->string('created_by');
            $table->string('update_by');
            $table->foreign('signature_1_id')->references('id')->on('structures')->onDelete('cascade');           
            $table->foreign('signature_2_id')->references('id')->on('structures')->onDelete('cascade');  
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
