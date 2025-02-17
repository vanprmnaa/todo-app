@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>About Me - Biodata Diri</title>
        <!-- Bootstrap CSS Lokal -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .profile-img {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                object-fit: cover;
                border: 5px solid #fff;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                background-color: #007bff;
                color: #fff;
                border-radius: 15px 15px 0 0;
            }

            .social-icon {
                font-size: 24px;
                margin: 0 10px;
                color: #007bff;
                transition: color 0.3s ease;
            }

            .social-icon:hover {
                color: #0056b3;
            }

            .navbar {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body>

        <!-- Konten Biodata -->
        <div id="content" class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <!-- Profile Image -->
                    <img src="{{ asset('images/pohang.jpg') }}" alt="Profile Picture" class="profile-img mb-4">
                    <h1 class="display-4 mb-3">Revan Permana</h1>
                    <p class="lead text-muted">Taruna Coding</p>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Biodata Diri</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Nama:</strong> Revan Permana
                                </li>
                                <li class="list-group-item">
                                    <strong>Tanggal Lahir:</strong> 04/06/2007
                                </li>
                                <li class="list-group-item">
                                    <strong>Email:</strong> revanpermana365@gmail.com
                                </li>
                                <li class="list-group-item">
                                    <strong>Telepon:</strong> +62 838-7336-5278
                                </li>
                                <li class="list-group-item">
                                    <strong>Hobi:</strong> Olahraga, Gaming, Travelling
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center">
                    <h4 class="mb-4">Temui Saya di Media Sosial</h4>
                    <a href="https://github.com/vanprmnaa" class="social-icon"><i class="bi bi-github"></i></a>
                    <a href="https://instagram.com/van.prmnaaa_" class="social-icon"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS Lokal -->
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </body>

    </html>
