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
                        <img src="{{ asset('images/group.png') }}" alt="Foto Ewaste" class="kampusicon2">
                        <div class="tulisandash2">
                            <div class="jumlahpengguna">{{ $jumlahPelanggan }}</div>
                            <div class="namapengguna">Pelanggan</div>
                        </div>  
                    </div>    

                    <div class="boxgender">
                        <div class="lakilaki">
                            <div class="jumlahlaki">{{ $jumlahLaki }}</div>
                            <div class="tulisanlaki">Laki-laki</div>
                        </div>

                        <div class="perempuan">
                            <div class="jumlahlaki">{{ $jumlahPerempuan }}</div>
                            <div class="tulisanlaki">Perempuan</div>
                        </div>
                    </div>

                    
            </div>    


            <div class="contwp">
                <img src="{{ asset('images/volunteer.png') }}" alt="Foto Ewaste" class="wpicon">
                <div class="jumlahlaki"> {{ $jumlahWastepals }} </div>
                <div class="tulisanlaki"> Wastepals</div>
                <div class="tulisanlaki"> /Relawan</div>
            </div> 

        </div>

        <div class="contdash2">

            <div class="contevent">
                <img src="{{ asset('images/event.png') }}" alt="Foto Ewaste" class="wpicon">
                <div class="jumlahlaki"> {{ $jumlahEvent }} </div>
                <div class="tulisanlaki"> Event</div>
                <div class="tulisanlaki"> dikelola</div>
            </div>

            <div class="contjenis">
                <div class="jenisjenis">
                    <div class="tulsamp">
                        <div class="jumlahsampah"> {{ $jumlahJenisSampah }} </div>
                        <div class="tulisansampah"> Jenis <br> Sampah</div>
                    </div>

                    <div class="jeniskecil"> 
                        <div class="namasampah"> Kertas </div>
                        <div class="kilosampah"> 20kg </div>
                    </div>
                    <div class="jeniskecilkar"> 
                        <div class="namasampah"> Kardus </div>
                        <div class="kilosampah"> 20kg </div>
                    </div>

                    <div class="jeniskecilplas"> 
                        <div class="namasampah"> Plastik </div>
                        <div class="kilosampah"> 20kg </div>
                    </div>

                    <div class="jeniskecilsisma"> 
                        <div class="namasampah"> Sisa Makanan </div>
                        <div class="kilosampah"> 20kg </div>
                    </div>

                </div>
            </div>

            <div class="contkilo">
                <div class="dikumpulkan">
                            
                    <div class="timbulansampah">
                        <div class="foto1">
                            <img src="{{ asset('images/timbulan.png') }}" alt="Foto Ewaste" class="foto1">
                        </div>
                        <div class="tulisanatasbawah">
                            <div class="tulisankilotim">
                                <span class="angka">122</span>
                                <span class="kg">kg</span>
                            </div>
                            <div class="tulisansampahdik">Sampah Dikumpulkan</div>
                        </div>
                    </div>


                </div>

                <div class="dikumpulkan">
                <div class="timbulansampah">
                    <div class="foto1">
                        <img src="{{ asset('images/recycle.png') }}" alt="Foto Ewaste" class="foto1">
                    </div>
                    <div class="tulisanatasbawah">
                        <div class="tulisankilotim">
                            <span class="angka">20</span>
                            <span class="kg">kg</span>
                        </div>
                        <div class="tulisansampahdik">Sampah Dimanfaatkan</div>
                    </div>
                </div>
                </div>
            </div>

            
        </div>
    </div>
@endsection
