<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampahJual;
use App\Models\Article;
use App\Models\SelectedArticle;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data sampah berdasarkan idSampah
        $sampahKertas = SampahJual::where('idSampah', 'SAMP001')->first();
        $sampahKardus = SampahJual::where('idSampah', 'SAMP002')->first();
        $sampahPlastik = SampahJual::where('idSampah', 'SAMP003')->first();

        // Ambil data dari selected_articles untuk tiga artikel
        $selectedArticles = SelectedArticle::first(); // Ambil satu baris pertama

        if ($selectedArticles) {
            $mainArticle = Article::where('idArtikel', $selectedArticles->main_article)->first();
            $article1 = Article::where('idArtikel', $selectedArticles->article_1)->first();
            $article2 = Article::where('idArtikel', $selectedArticles->article_2)->first();
            $article3 = Article::where('idArtikel', $selectedArticles->article_3)->first();
        } else {
            $mainArticle = null;
            $article1 = null;
            $article2 = null;
            $article3 = null;
        }

        return view('landingpage', compact('sampahKertas', 'sampahKardus', 'sampahPlastik', 'mainArticle', 'article1', 'article2', 'article3'));
    }
}
