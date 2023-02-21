<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecognitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recognitions', function (Blueprint $table) {
            $table->id();

            $table->string('message');
            $table->string('hehaviors');

            $table->bigInteger('collaborator_id')->unsigned()->required();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->bigInteger('skill_id')->unsigned()->required();
            $table->foreign('skill_id')->references('id')->on('skills');

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
        Schema::dropIfExists('recognitions');
    }
}
