@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboardadmin.css') }}">
@endsection

@section('content')

    <div class="container">
        <p>Welcome, {{ session('nmAdmin') }}!</p>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="contdash1">
            <div class="contkampusfaku">
                <div class="contkampus">
                    <img src="{{ asset('images/kampus.png') }}" alt="Foto Ewaste" class="kampusicon">
                    <div class="tulisandash">
                        <div class="jumlahkampus">{{ $jumlahKampus }}</div>
                        <div class="namakampus">Kampus</div>
                    </div>  
                </div>

                <div class="contfaku">
                    <img src="{{ asset('images/fakultas.png') }}" alt="Foto Ewaste" class="kampusicon">
                    <div class="tulisandash">
                        <div class="jumlahfakultas">{{ $jumlahFakultas }}</div>
                        <div class="namafakultas">Fakultas</div>
                    </div>  
                </div>
            </div>    

            <div class="contuser">
                    <div class="userpertama">
                        <img src="{{ asset('images/fakultas.png') }}" alt="Foto Ewaste" class="kampusicon">
                        <div class="tulisandash2">
                            <div class="jumlahpengguna">{{ $jumlahPelanggan }}</div>
                            <div class="namapengguna">Pelanggan</div>
                        </div>  
                    </div>    
            </div>    


            <div class="contwp">
 
            </div> 

        </div>

        <div class="contdash2">
            
        </div>
    </div>
@endsection
