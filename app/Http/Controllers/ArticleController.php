<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.kelolaartikel', compact('articles'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_article' => 'nullable|exists:articles,idArtikel',
            'article1' => 'nullable|exists:articles,idArtikel',
            'article2' => 'nullable|exists:articles,idArtikel',
            'article3' => 'nullable|exists:articles,idArtikel',
        ]);

        // Simpan pilihan artikel ke dalam database atau config
        // Misalnya simpan ke dalam config menggunakan cache
        cache()->put('main_article', $request->main_article);
        cache()->put('article1', $request->article1);
        cache()->put('article2', $request->article2);
        cache()->put('article3', $request->article3);

        return back()->with('success', 'Perubahan Berhasil');
    }
}
