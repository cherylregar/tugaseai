<!-- File: resources/views/logincust.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer</title>
    <link rel="stylesheet" href="{{ asset('css/logincust.css') }}">
</head>
<body>
    <div class="logowastematelarge">
        <img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="WasteMate Logo">
    </div>
    <div class="tulisanlogin">
        Menghubungkan <span class="highlight">Pendidikan</span> dan <span class="highlight">Keberlanjutan</span>: WasteMate, Matahari Baru Bagi Kampus Hijau. Gabung sekarang!
    </div>
    <div class="logincon">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="ajakantulisanlogin">Yuk, lanjutkan perjalananmu, <span class="highlight">#WasteMate!</span></div>
            <div class="inputemail">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="inputsandi">
                <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
            </div>
            <div class="masuklogin">
                <button type="submit">Masuk</button>
            </div>
        </form>
        <div class="belumpunyaakun">
            Belum punya akun? <span class="highlight">Daftar sekarang!</span>
        </div>
    </div>
</body>
</html>
