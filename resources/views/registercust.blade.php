<!-- resources/views/registercust.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <link rel="stylesheet" href="{{ asset('css/logincust.css') }}">
    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
</head>
<body>
    <div class="logowastematelarge">
        <img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="WasteMate Logo">
    </div>
    <div class="tulisanlogin">
        Menghubungkan <span class="highlight">Pendidikan</span> dan <span class="highlight">Keberlanjutan</span>: WasteMate, Matahari Baru Bagi Kampus Hijau. Gabung sekarang!
    </div>
    <div class="logincon">
        <form action="{{ route('registercust') }}" method="POST">
            @csrf
            <div class="ajakantulisanlogin">Yuk, bergabung dengan kami, <span class="highlight">#WasteMate!</span></div>

            <div class="inputemail">
                <input type="text" id="idPelanggan" name="idPelanggan" placeholder="ID Pelanggan" required>
            </div>
            <div class="inputemail">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="inputsandi">
                <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
            </div>
            <div class="inputemail">
                <input type="text" id="nim" name="nim" placeholder="NIM" required>
            </div>

            <div class="inputdropdown">
                <select name="idKampus" required>
                    <option value="">Pilih Kampus</option>
                    @foreach($kampus as $k)
                        <option value="{{ $k->idKampus }}">{{ $k->idKampus }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inputdropdown">
                <select name="idFakultas" required>
                    <option value="">Pilih Fakultas</option>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->idFakultas }}">{{ $f->idFakultas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inputradio">
                <label for="jenisKel">Jenis Kelamin:</label>
                <input type="radio" id="perempuan" name="jenisKel" value="Perempuan" required> Perempuan
                <input type="radio" id="laki-laki" name="jenisKel" value="Laki-laki" required> Laki-laki
            </div>

            <div class="masuklogin">
                <button type="submit">Daftar</button>
            </div>
        </form>
        <div class="belumpunyaakun">
            Sudah punya akun? <a href="{{ route('logincust') }}" class="highlight">Login disini</a>
        </div>
    </div>
</body>
</html>
