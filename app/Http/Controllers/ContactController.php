<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact Us'; // Definisikan variabel title
        return view('contact', compact('title')); // Kirim variabel ke view
    }
}