{{-- @props(['title' => 'Home']) --}}
<nav class="navbar navbar-expand-lg navbar-light fixed-top backdrop-blur-lg"
    style="background: rgba(255, 141, 141, 0.5); box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
    <div class="container">
        {{-- Title di Navbar --}}
        <a class="navbar-brand fw-bold fs-4" style="color: #630000 !important;" href="{{ route('home') }}">Todo App</a>

        {{-- Tombol untuk menampilkan menu --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigasi di Navbar --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Tombol Navigasi Home --}}
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}"
                        {{ $title === 'Home' ? "aria-current='page'" : '' }} href="{{ route('home') }}">Home</a>
                </li>

                {{-- Tombol Navigasi About --}}
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'About Us' ? 'active' : '' }}"
                        {{ $title === 'About Us' ? "aria-current='page'" : '' }} href="{{ route('about') }}">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
