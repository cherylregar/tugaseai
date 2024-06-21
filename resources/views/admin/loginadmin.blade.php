<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/loginadmin.css') }}">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('errorMsg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('errorMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="logo">
                    <img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="Logo" width="100">
                </div>
                <div class="login-container square-container">
                    <div class="welcome-message">Selamat Datang Internal #WasteMate!</div>
                    <div class="form-group">
                        <input type="email" name="emailAdmin" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Sandi" required>
                    </div>
                    <button type="submit" class="btn btn-masuk">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
