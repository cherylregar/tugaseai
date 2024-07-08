<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $article->judulArtikel }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>
<body>
    @include('partials._newnavbar')

    <div class="container">
        <div class="judulartikelditekan">
            {{ $article->judulArtikel }}
        </div>
        <div class="fotoartikelditekan">
            <img src="{{ asset('storage/fotos/' . $article->fotoArtikel) }}" alt="Foto Artikel">
        </div>
        <div class="isiartikel">
            @foreach(explode('.', $article->isiArtikel) as $index => $sentence)
                {{ $sentence }}.
                @if(($index + 1) % 4 == 0)
                    <br><br>
                @endif
            @endforeach
        </div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
