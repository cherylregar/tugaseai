<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('selected_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_article')->nullable();
            $table->unsignedBigInteger('article_1')->nullable();
            $table->unsignedBigInteger('article_2')->nullable();
            $table->unsignedBigInteger('article_3')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('selected_articles');
    }
}
