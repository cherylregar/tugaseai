<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('landingpage') }}">
                <img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="Logo" class="logo">
            </a>
            <div class="search-container search-container-responsive">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-bar" placeholder="Cari kampus">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('landingpage') ? 'active' : '' }}" href="{{ route('landingpage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
            </ul>
            <div class="search-container search-container-desktop">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-bar" placeholder="Cari kampus">
            </div>
            <ul class="navbar-nav ml-auto align-items-center"> <!-- Add align-items-center class -->
                <li class="nav-item">
                    <a href="{{ route('logincust') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <button class="signup-button">Sign Up</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
