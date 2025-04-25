<!-- resources/views/testingregister.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .error-message {
            background-color: red;
            color: white;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
            max-width: 400px;
            width: 100%;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Terjadi Kesalahan Saat Registrasi</h1>

    <!-- Menampilkan pesan error jika ada -->
    @if(session('error'))
        <div class="error-message">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="button">
        <a href="{{ route('registercustform') }}" style="color: white; text-decoration: none;">Kembali ke Form Registrasi</a>
    </div>
</body>
</html>
