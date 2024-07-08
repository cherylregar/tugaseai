@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editartikel.css') }}">
@endsection

@section('content')
    <div class="ctrlarticlecon">
        <div class="judulforarticle">
            Edit Artikel
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

        <form action="{{ route('admin.update', $article->idArtikel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judulArtikel">Judul Artikel:</label>
                <input type="text" name="judulArtikel" id="judulArtikel" class="form-control" value="{{ $article->judulArtikel }}" required>
            </div>

            <div class="form-group">
                <label for="isiArtikel">Isi Artikel:</label>
                <textarea name="isiArtikel" id="isiArtikel" class="form-control" rows="5" required>{{ $article->isiArtikel }}</textarea>
            </div>

            <div class="form-group">
                <label for="fotoArtikel">Foto Artikel:</label>
                <input type="file" name="fotoArtikel" id="fotoArtikel" class="form-control">
                @if($article->fotoArtikel)
                    <img src="{{ asset('fotos/' . $article->fotoArtikel) }}" alt="Foto Artikel" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection
