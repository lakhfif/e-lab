<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratoires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('membre_id')->nullable()->unsigned();
            $table->foreign('membre_id')
              ->references('id')
              ->on('membres');
            $table->timestamps();
        });
        DB::table('laboratoires')->insert(
        array(
            'nom' => 'laboratoire de recherche scientifique',
            'description' =>'Ce laboratoire constitue un domaine de recherche très actif dans notre établissement (ENSA) . Ce domaine réunit également de nombreux jeunes chercheurs. . L’objectif de ce laboratoire est d’encourager davantage les échanges scientifiques, autant entre ses membres qu’à l’extérieur du groupe. Il se caractérise par l’intensité de ses collaborations multidisciplinaires; tous les membres travaillant au développement de modèles mathématiques et de méthodes numériques appliqués dans le domaine des sciences et du génie. Ils sont très actifs tant dans la recherche que dans la formation, supervisant de nombreux étudiants en thèse. Une des caractéristiques principales de ce laboratoire est la collaboration soutenue de ses membres avec des chercheurs de différents domaines (voir les axes de recherche). Chaque année, le laboratoire organise les journées dans des thèmes différentes et un séminaire hebdomadaire en mathématiques appliquées.'
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratoires');
    }
}
