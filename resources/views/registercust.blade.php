<!-- resources/views/registercust.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <link rel="stylesheet" href="{{ asset('css/logincust.css') }}">
    <style>
        /* Styling untuk popup */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 8px;
            display: none; /* Secara default popup tersembunyi */
            z-index: 1000;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .popup.show {
            display: block; /* Tampilkan popup */
        }
    </style>
    <script>
        // Menampilkan popup jika ada pesan error
        @if(session('error'))
            window.onload = function() {
                var popup = document.getElementById('errorPopup');
                popup.innerHTML = "{{ session('error') }}"; // Tampilkan pesan error
                popup.classList.add('show'); // Tampilkan popup
            };
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
        <!-- Form Registrasi -->
        <form action="{{ route('registercust') }}" method="POST">
            @csrf
            <div class="ajakantulisanlogin">Yuk, bergabung dengan kami, <span class="highlight">#WasteMate!</span></div>

            <div class="inputemail">
                <input type="text" id="idPelanggan" name="idPelanggan" placeholder="ID Pelanggan" required value="{{ old('idPelanggan') }}">
                @error('idPelanggan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputemail">
                <input type="text" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputsandi">
                <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputemail">
                <input type="text" id="nim" name="nim" placeholder="NIM" required value="{{ old('nim') }}">
                @error('nim')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputemail">
                <input type="email" id="emailPel" name="emailPel" placeholder="Email" required value="{{ old('emailPel') }}">
                @error('emailPel')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputdropdown">
                <select name="idKampus" required>
                    <option value="">Pilih Kampus</option>
                    @foreach($kampus as $k)
                        <option value="{{ $k->idKampus }}" {{ old('idKampus') == $k->idKampus ? 'selected' : '' }}>{{ $k->idKampus }}</option>
                    @endforeach
                </select>
                @error('idKampus')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputdropdown">
                <select name="idFakultas" required>
                    <option value="">Pilih Fakultas</option>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->idFakultas }}" {{ old('idFakultas') == $f->idFakultas ? 'selected' : '' }}>{{ $f->idFakultas }}</option>
                    @endforeach
                </select>
                @error('idFakultas')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="inputradio">
                <label for="jenisKel">Jenis Kelamin:</label>
                <input type="radio" id="perempuan" name="jenisKel" value="Perempuan" {{ old('jenisKel') == 'Perempuan' ? 'checked' : '' }} required> Perempuan
                <input type="radio" id="laki-laki" name="jenisKel" value="Laki-laki" {{ old('jenisKel') == 'Laki-laki' ? 'checked' : '' }} required> Laki-laki
                @error('jenisKel')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="masuklogin">
                <button type="submit">Daftar</button>
            </div>
        </form>

        <div class="belumpunyaakun">
            Sudah punya akun? <a href="{{ route('logincust') }}" class="highlight">Login disini</a>
        </div>
    </div>

    <!-- Popup Error -->
    <div id="errorPopup" class="popup"></div>

</body>
</html>
