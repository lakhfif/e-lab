<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResponsableToEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipes', function (Blueprint $table) {

            $table->integer('membre_id')->nullable()->unsigned();
            $table->foreign('membre_id')
              ->references('id')
              ->on('membres');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes', function (Blueprint $table) {
            
            $table->dropColumn('membre_id');
            
        });
    }
}
