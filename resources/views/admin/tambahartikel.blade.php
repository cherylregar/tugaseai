@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/tambahart.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2 class="judultambah">Tambah Artikel</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.storeartikel') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="formtambah">
                <label for="idArtikel" class="body-text">ID Artikel</label>
                <input type="text" id="idArtikel" name="idArtikel" placeholder="Input ID artikel Anda di sini">
            </div>

            <div class="formtambah">
                <label for="judulArtikel" class="body-text">Judul Artikel</label>
                <input type="text" id="judulArtikel" name="judulArtikel" placeholder="Input judul artikel di sini">
            </div>

            <div class="formtambah">
                <label for="isiArtikel" class="body-text">Isi Artikel</label>
                <textarea id="isiArtikel" name="isiArtikel" rows="6" placeholder="Masukkan isi artikel di sini"></textarea>
            </div>

            <div class="formtambah">
                <label for="idAdmin" class="body-text">ID Admin</label>
                <select id="idAdmin" name="idAdmin">
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->idAdmin }}">{{ $admin->idAdmin }}</option>
                    @endforeach
                </select>
            </div>

            <div class="formtambah">
                <label for="fotoArtikel" class="body-text">Foto Artikel</label>
                <input type="file" id="fotoArtikel" name="fotoArtikel">
            </div>

            <button type="submit" class="tombol-tambah">Tambahkan Artikel</button>
        </form>

        
    </div>
@endsection

@section('scripts')
    <script>
        @if (session('success'))
            swal("Sukses!", "{{ session('success') }}", "success");
        @endif
    </script>
@endsection
