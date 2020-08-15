<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->float('prix')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('nb_chambre')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->string('subcategory');
            $table->string('ville')->nullable();
            $table->string('etat')->nullable();
            $table->string('caracteristique')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('article');
    }
}
