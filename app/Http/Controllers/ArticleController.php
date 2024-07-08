<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function updateLandingPageArticles(Request $request)
    {
        // Validasi request
        $request->validate([
            'main_article' => 'required|string',
            'article_1' => 'required|string',
            'article_2' => 'required|string',
            'article_3' => 'required|string',
        ]);

        // Simpan data yang dipilih ke dalam database
        $selectedArticles = SelectedArticle::updateOrCreate(
            ['id' => 1], // Atau gunakan id yang sesuai jika ada
            [
                'main_article' => $request->main_article,
                'article_1' => $request->article_1,
                'article_2' => $request->article_2,
                'article_3' => $request->article_3,
            ]
        );

        // Setelah berhasil menyimpan, alihkan ke halaman landing atau berikan respons yang sesuai
        return redirect()->route('landingpage')->with('success', 'Artikel untuk landing page berhasil diperbarui.');
    }

    public function show($idArtikel)
    {
        $article = Article::where('idArtikel', $idArtikel)->firstOrFail();
        return view('articlespages', compact('article'));
    }
}
