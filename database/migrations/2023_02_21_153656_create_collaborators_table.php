<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('last_name');
            $table->string('cedula');
            $table->Integer('votes')->default(0);
            $table->Integer('participation')->default(0);
            $table->Integer('intentos')->default(0);
            $table->Integer('state')->default(1);
            
            $table->bigInteger('area_id')->unsigned()->required();
            $table->foreign('area_id')->references('id')->on('areas');

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
        Schema::dropIfExists('collaborators');
    }
}
