<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Title halaman yang didapatkan dari data title yang dikirim dari controller dan nama aplikasi yang didapatkan dari konfigurasi --}}
    <title>{{ $title ?? 'Default Title' }} - {{ config('app.name') }}</title>

    <!-- Import bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">

    {{-- Custom Style --}}
    <style>
        /* Menghilangkan scrollbar */
        ::-webkit-scrollbar {
            display: none;
        }

        /* Membuat background pada body halaman */
        body {
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/bg.jpeg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        /* Membuat effect blur pada background */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: -1;
        }

        /* Mengatur warna link aktif */
        .nav-link.active {
            font-weight: bold;
            color: #630000 !important;
        }

        /* Mengatur tampilan gambar pada halaman About */
        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Mengatur tampilan icon */
        .social-icon {
            color: #ff9393;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            font-size: 1.5rem;
            line-height: 1;
        }

        /* Mengatur tampilan icon saat dihover */
        .social-icon:hover {
            background: #ff9393;
            color: white;
        }

        /* Mengatur tampilan navbar */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    @include('partials.navbar') <!-- Mengambil component navbar -->

    @yield('content') <!-- Render content -->

    @include('partials.modal') <!-- Mengambil component modal -->

    <script src="{{ asset('js/script.js') }}"></script> <!-- Import custom JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import bootstrap JS -->
</body>

</html>
