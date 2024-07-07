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
@endsection
