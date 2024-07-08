@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editartikel.css') }}">
@endsection

@section('content')
    <div class="ctrlarticlecon">
        <div class="judulforarticle">
            Kelola Artikel di Landing Page
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.update.landingpage') }}" method="POST">
            @csrf
            <div class="ctrlmainarticle">
                <div class="maintitleart">
                    <span>Main Article</span>
                </div>
                <div class="tulisanartmain">
                    PILIH ID ARTIKEL UNTUK DITAMPILKAN:
                </div>
                <div class="dropdownmainart" alt="artikelmain">
                    <select name="main_article">
                        <option>Pilih ID Artikel</option>
                        @foreach($articles as $article)
                            <option value="{{ $article->idArtikel }}">{{ $article->idArtikel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="ctrltigaart">
                <div class="tigatitleart">
                    <span>Three Article</span>
                </div>

                @for ($i = 1; $i <= 3; $i++)
                    <div class="tulisantigaart">
                        PILIH ID ARTIKEL UNTUK ARTIKEL #{{ $i }}
                    </div>
                    <div class="dropdowntigaart" alt="artikel{{ $i }}">
                        <select name="article_{{ $i }}">
                            <option>Pilih ID Artikel #{{ $i }}</option>
                            @foreach($articles as $article)
                                <option value="{{ $article->idArtikel }}">{{ $article->idArtikel }}</option>
                            @endforeach
                        </select>
                    </div>
                @endfor
            </div>

            <button type="submit" class="simpanubahartikel">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <div class="tabelartikel">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Artikel</th>
                    <th>Judul Artikel</th>
                    <th>Isi Artikel</th>
                    <th>ID Admin</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                    <th>Foto Artikel</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->idArtikel }}</td>
                        <td>{{ $article->judulArtikel }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($article->isiArtikel, 50, '...') }}</td>
                        <td>{{ $article->idAdmin }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $article->idArtikel) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.delete', $article->idArtikel) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td><img src="{{ asset('storage/fotos/' . $article->fotoArtikel) }}" alt="Foto Artikel" width="50"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
