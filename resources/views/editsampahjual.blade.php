@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Edit Data Sampah</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sampahjual.update', $sampah->idSampah) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nmSampah">Nama Sampah</label>
                <input type="text" name="nmSampah" id="nmSampah" class="form-control" value="{{ $sampah->nmSampah }}" required>
            </div>

            <div class="form-group">
                <label for="poinjual">Poin Jual</label>
                <input type="number" name="poinjual" id="poinjual" class="form-control" value="{{ $sampah->poinjual }}" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto Sampah</label>
                @if ($sampah->foto)
                    <div class="mb-3">
                        <img src="{{ asset('storage/fotos/' . $sampah->foto) }}" alt="{{ $sampah->nmSampah }}" width="100">
                    </div>
                @endif
                <input type="file" name="foto" id="foto" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.adminpage') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
