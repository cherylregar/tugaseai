<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedArticle extends Model
{
    protected $table = 'selected_articles';

    protected $fillable = [
        'main_article', 'article_1', 'article_2', 'article_3'
    ];

    public $timestamps = true;
}
