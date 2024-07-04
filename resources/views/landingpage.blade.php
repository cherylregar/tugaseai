@extends('layouts.main')

@section('title', 'Landing Page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landingpageresponsive.css') }}">
@endsection

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
                    <span class="tulisanjenis">{{ $sampahKertas->nmSampah ?? 'Nama Sampah tidak tersedia' }}</span>
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
                    <span class="tulisanjenis">{{ $sampahKardus->nmSampah ?? 'Nama Sampah tidak tersedia' }}</span>
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
                    <span class="tulisanjenis">{{ $sampahPlastik->nmSampah ?? 'Nama Sampah tidak tersedia' }}</span>
                </div>
            </div>
        </div>
        <p class="keterangan">*Sampah yang dapat ditukar menjadi poin</p>
    </div>

    <div class="bjcon2">
        <p class="tulewaste">E-Waste</p>
        <img src="{{ asset('images/ewastenew.png') }}" alt="Foto Ewaste" class="ewastefoto">
        <p class="qewaste"> Punya sampah elektronik? </p>
        <div class="descewaste"> Limbah elektronik yang dibuang sembarangan dapat mencemari lingkungan. Pelajari cara pilahnya! </div>
    </div>
</div>

<div class="sdgs">
    <img src="{{ asset('images/sdgslogo.png') }}" alt="SDGs Logo" class="sdgslogo">
    <div class="tulisansdgs">Kami Mendukung Pembangunan Berkelanjutan</div>
</div>

<div class="sdgsdesc">
    <div class="sdgspoint">
        <img src="{{ asset('images/goal12.png') }}" alt="Goal 12" class="fotopsdgs">
        <div class="descgoal">
            “Mendukung Target 12.5 yaitu
            pada tahun 2030, secara
            substansial mengurangi produksi
            limbah melalui pencegahan,
            pengurangan, daur ulang, dan
            penggunaan kembali.”
        </div>
    </div>
    <div class="sdgspoint">
        <img src="{{ asset('images/goal13.png') }}" alt="Goal 13" class="fotopsdgs">
        <div class="descgoal">
            “Membantu pencapaian ini dengan menghubungkan pelanggan dengan pihak yang dapat membantu untuk mendaur ulang sampah. Yaitu sampah plastik dan sampah kertas.”
        </div>
    </div>

</div>


    <div class="ecocontainer">
        <img src="{{ asset('images/iconeecoheroes.png') }}" alt="Eco Heroes" class="iconecoheroes">
        <div class="tulecoh">
            <span class="italic">Eco Heroes </span>
            <span class="normal"> di Bulan </span>
            <span class="bold"> Juli!</span>
        </div>

        <div class="desccon">
            <div class="pdesccon">
                "Kami sangat menghargai para pahlawan lingkungan, yaitu mereka yang berpartisipasi secara aktif untuk menyetor sampah terpilahnya setiap bulannya."
            </div>
        </div>

        <div class="listhero">
            <div class="userhero">
                <div class="fotohero">
                    <!-- Hero Pertama -->
                </div>
                <div class="infohero">
                    <span class="username">@cherrgr</span> <span class="weight">Telkom University | 10kg</span>
                </div>
            </div>

            <div class="userhero">
                <div class="fotohero">
                    <!-- Hero Kedua -->
                </div>
                <div class="infohero">
                    <span class="username">@cherrgr</span> <span class="weight">Telkom University | 10kg</span>
                </div>
            </div>

            <div class="userhero">
                <div class="fotohero">
                    <!-- Hero Ketiga -->
                </div>
                <div class="infohero">
                    <span class="username">@cherrgr</span> <span class="weight">Telkom University | 10kg</span>
                </div>
            </div>
            
        </div>


        <div class="buttonleaderboard">
                <button class="lihatleaderboard">Lihat Leaderboard</button>
        </div>

    </div>
    
    <div class="caramemilah">
    <img src="{{ asset('images/milah.png') }}" alt="Cara Memilah" class="milah-img">
    <div class="detailajakan">
        <div class="judulpelajari">Pelajari Bagaimana <br> Cara Memilah Sampah</div>
        <div class="descpelajari">
            Tidak tahu cara memilah yang tepat? Tenang, kami hadir untuk mendampingi dan memberikan Anda edukasi!
        </div>
        <div class="caramilah">
            <button class="caramilah-button">Lihat Selengkapnya</button>
        </div>
    </div>  
    </div>
    <div class="gabungwastepals">
        <div class="tulgabung">
            <p>Gabung menjadi</p>
            <p class="wastepals">Wastepals!</p>
            <button class="daftarwp">Daftar Wastepals</button>
        </div>
        <div class="descwpajak">
            <p>Wastepals adalah komunitas relawan lingkungan Wastemate, membantu dan mengkoordinir pengelolaan sampah di kampusnya!</p>
        </div>
    </div>

    


    

@endsection
