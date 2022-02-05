<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // On crée la colonne article_id, qui équivaut à la colonne id dans la table articles. 
            $table->unsignedBigInteger('article_id');
            // Contrainte entre les 2 tables. Si on efface un article, on efface tous les likes associés
            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
