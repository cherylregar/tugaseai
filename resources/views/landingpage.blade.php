@extends('layouts.main')

@section('title', 'Landing Page')

@section('content')
    <div class="containerawal">
        <p>Kami disini untuk <span class="highlight">melayani</span>,<br> dan <span class="highlight">menyelamatkan</span> bumi!</p>
        <div class="buttonmemilah">
            <button class="start-button">Mulai Memilah</button>
        </div>
    </div>

    <div class="boxjualan">
        
        <div class="bjcon1">
            <div class="jenisdijual">
                <div class="concontainer">
                    <div class="rectangle1">
                        @if ($sampahKertas && file_exists(public_path('storage/fotos/' . $sampahKertas->foto)))
                            <img src="{{ asset('storage/fotos/' . $sampahKertas->foto) }}" alt="{{ $sampahKertas->nmSampah }}" class="foto-sampah">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </div>
                    <div class="rectanglea">
                        <span class="tulisanjenis">{{ $sampahKertas->nmSampah }}</span>
                    </div>
                </div>
                <div class="concontainer">
                    <div class="rectangle1">
                        @if ($sampahKardus && file_exists(public_path('storage/fotos/' . $sampahKardus->foto)))
                            <img src="{{ asset('storage/fotos/' . $sampahKardus->foto) }}" alt="{{ $sampahKardus->nmSampah }}" class="foto-sampah">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </div>
                    <div class="rectanglea">
                        <span class="tulisanjenis">{{ $sampahKardus->nmSampah }}</span>
                    </div>
                </div>
                <div class="concontainer">
                    <div class="rectangle1">
                        @if ($sampahPlastik && file_exists(public_path('storage/fotos/' . $sampahPlastik->foto)))
                            <img src="{{ asset('storage/fotos/' . $sampahPlastik->foto) }}" alt="{{ $sampahPlastik->nmSampah }}" class="foto-sampah">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </div>
                    <div class="rectanglea">
                        <span class="tulisanjenis">{{ $sampahPlastik->nmSampah }}</span>
                    </div>
                </div>
            </div>
            <p class="keterangan">*Sampah yang dapat ditukar menjadi poin</p>
        </div>

        <div class="bjcon2">
            <p class="tulewaste">E-Waste</p>
            
        </div>
    </div>
@endsection
