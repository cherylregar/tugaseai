@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Welcome, {{ session('nmAdmin') }}!</h1>


        <div class="bjcon1">
            <div class="jenisdijual">
                @foreach($sampahJual as $sampah)
                    <div class="concontainer">
                        <div class="rectangle1">
                            @if (file_exists(public_path('storage/fotos/' . $sampah->foto)))
                                <img src="{{ asset('storage/fotos/' . $sampah->foto) }}" alt="{{ $sampah->nmSampah }}" class="foto-sampah">
                            @else
                                <p>Foto tidak tersedia</p>
                            @endif
                        </div>
                        <div class="rectanglea">
                            <span class="tulisanjenis">{{ $sampah->nmSampah }}</span>
                            <div class="btn-circle">
                                <a href="{{ route('sampahjual.edit', $sampah->idSampah) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt" style="color:white;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="keterangan">*Sampah yang dapat ditukar menjadi poin</p>
        </div>
    </div>
@endsection
