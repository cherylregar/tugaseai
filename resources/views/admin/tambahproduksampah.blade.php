@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/tpsampah.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2 class="judultps">Tambah Produk Sampah</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.storeproduksampah') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="formts">
                <label for="idSampah" class="body-text">ID Sampah</label>
                <input type="text" id="idSampah" name="idSampah" placeholder="Input ID produk anda disini (Awali dengan SAMP00*)">
                <p class="body-text">ID Sampah Yang Terakhir di Input adalah {{ $lastSampah->idSampah ?? 'Belum ada ID Sampah yang diinput' }}</p>
            </div>

            <div class="formts">
                <label for="nmSampah" class="body-text">Nama Produk Sampah</label>
                <input type="text" id="nmSampah" name="nmSampah" placeholder="Input nama produk sampah disini">
            </div>

            <div class="formts">
                <label for="poinjual" class="body-text">Jumlah Poin Sampah</label>
                <input type="number" id="poinjual" name="poinjual" placeholder="Tentukan Jumlah Poin (Angka)">
            </div>

            <div class="formts">
                <label for="foto" class="body-text">Foto Produk</label>
                <input type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="tombol-tambah">Tambahkan Produk</button>
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
