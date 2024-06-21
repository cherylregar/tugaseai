<!-- resources/views/kesalahanlogin.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Sesuaikan dengan stylesheet yang Anda miliki -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="alert alert-danger" role="alert">
                    Email atau password salah. Silakan coba lagi.
                </div>
                <a href="{{ route('loginadmin') }}" class="btn btn-primary">Kembali ke Halaman Login</a>
            </div>
        </div>
    </div>
</body>
</html>
