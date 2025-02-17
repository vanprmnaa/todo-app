<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Membuat method index untuk menampilkan halaman about
    public function index()
    {
        $title = 'About Us'; // Definisikan variabel title
        return view('about', compact('title')); // Kirim variabel ke view
    }
}
