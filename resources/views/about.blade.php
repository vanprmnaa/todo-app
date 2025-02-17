@extends('layouts.app')

@section('content')
    <!-- Konten Biodata -->
    <div id="content" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <!-- Profile Image -->
                <img src="{{ asset('images/pohang.jpg') }}" alt="Profile Picture" class="profile-img mb-2">
                <h1 class="text-white fw-bold">Revan Permana</h1>
                <p class="fs-6 fw-medium text-secondary">Taruna Coding</p>
            </div>
        </div>

        {{-- Biodata --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card blur-lg" style="background: rgba(255, 255, 255, 0.4);">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Biodata Diri</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-danger">
                                <strong>Nama:</strong> Revan Permana
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <strong>Tanggal Lahir:</strong> 04/06/2007
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <strong>Email:</strong> revanpermana365@gmail.com
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <strong>Telepon:</strong> +62 838-7336-5278
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <strong>Hobi:</strong> Olahraga, Gaming, Travelling
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Media Sosial --}}
        <div class="row justify-content-center mt-2">
            <div class="col-md-8 text-center">
                <h4 class="mb-4 text-white">Temui Saya di Media Sosial</h4>
                <a href="https://github.com/vanprmnaa" class="social-icon"><i class="bi bi-github"></i></a>
                <a href="https://instagram.com/van.prmnaaa_" class="social-icon"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
@endsection
