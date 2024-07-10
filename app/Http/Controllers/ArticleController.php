<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SelectedArticle;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function showKelolaArtikel()
    {
        $articles = Article::all();
        return view('admin.kelolaartikel', compact('articles'));
    }

    public function updateLandingPageArticles(Request $request)
    {
        $request->validate([
            'main_article' => 'required|string',
            'article_1' => 'required|string',
            'article_2' => 'required|string',
            'article_3' => 'required|string',
        ]);

        $selectedArticles = SelectedArticle::updateOrCreate(
            ['id' => 1], // Atau gunakan id yang sesuai jika ada
            [
                'main_article' => $request->main_article,
                'article_1' => $request->article_1,
                'article_2' => $request->article_2,
                'article_3' => $request->article_3,
            ]
        );

        return redirect()->route('landingpage')->with('success', 'Artikel untuk landing page berhasil diperbarui.');
    }

    public function show($idArtikel)
    {
        $article = Article::where('idArtikel', $idArtikel)->firstOrFail();
        return view('articlespages', compact('article'));
    }

    public function edit($idArtikel)
    {
        $article = Article::findOrFail($idArtikel);
        return view('admin.editdataartikel', compact('article'));
    }
    
    public function update(Request $request, $idArtikel)
    {
        $request->validate([
            'judulArtikel' => 'required|string|max:49',
            'isiArtikel' => 'required|string',
            'fotoArtikel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = Article::findOrFail($idArtikel);
        $article->judulArtikel = $request->judulArtikel;
        $article->isiArtikel = $request->isiArtikel;

        if ($request->hasFile('fotoArtikel')) {
            // Hapus foto lama jika ada
            if ($article->fotoArtikel && file_exists(public_path('storage/fotos/' . $article->fotoArtikel))) {
                unlink(public_path('storage/fotos/' . $article->fotoArtikel));
            }

            // Simpan foto baru dengan nama asli
            $file = $request->file('fotoArtikel');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('storage/fotos'), $fileName);
            $article->fotoArtikel = $fileName;
        }

        $article->save();

        return redirect()->route('admin.kelolaartikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idArtikel' => 'required|string|max:11|unique:articles',
            'judulArtikel' => 'required|string|max:49',
            'isiArtikel' => 'required|string',
            'fotoArtikel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'idAdmin' => 'required|string|exists:admins,idAdmin',
        ]);

        $article = new Article();
        $article->idArtikel = $request->idArtikel;
        $article->judulArtikel = $request->judulArtikel;
        $article->isiArtikel = $request->isiArtikel;
        $article->idAdmin = $request->idAdmin; // Assign idAdmin from the request

        if ($request->hasFile('fotoArtikel')) {
            $file = $request->file('fotoArtikel');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/fotos'), $fileName);
            $article->fotoArtikel = $fileName;
        }

        $article->save();

        return redirect()->route('admin.kelolaartikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function create()
    {
        // Check if admin is authenticated
        if (!Auth::guard('admin')->check()) {
            // If admin is not authenticated, redirect or take other action
            return redirect()->route('loginadmin')->with('errorMsg', 'Silakan login terlebih dahulu.');
        }

        // Fetch the last article
        $lastArticle = Article::latest()->first();
        $lastIdArtikel = $lastArticle ? $lastArticle->idArtikel : null;

        // Fetch all admins
        $admins = Admin::all();

        // Send data to the view
        return view('admin.tambahartikel', [
            'lastIdArtikel' => $lastIdArtikel,
            'admins' => $admins,
        ]);
    }

    public function destroy($idArtikel)
    {
        $article = Article::findOrFail($idArtikel);
        $article->delete();
        return redirect()->route('admin.kelolaartikel')->with('success', 'Artikel berhasil dihapus.');
    }
}
