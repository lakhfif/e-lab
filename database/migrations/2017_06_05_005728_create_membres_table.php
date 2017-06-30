<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('password');
            $table->string('adresse')->nullable();
            $table->string('status');
            $table->string('email');
            $table->string('telephone');
            $table->string('cv');
            $table->text('description')->nullable();
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')
              ->references('id')
              ->on('equipes');
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
        Schema::dropIfExists('membres');
    }
}
