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
            $table->string('distinction_signataire_1')->nullable()->default('text');
            $table->string('distinction_signataire_2')->nullable()->default('text');
            $table->boolean('isinterim1')->nullable()->default(false);
            $table->boolean('isparorodre1')->nullable()->default(false);
            $table->boolean('isinterim2')->nullable()->default(false);
            $table->boolean('isparorodre2')->nullable()->default(false);
            $table->string('nominterim1', 255)->nullable()->default('text');
            $table->string('nominterim2', 255)->nullable()->default('text');
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
