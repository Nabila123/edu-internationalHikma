<?php

namespace App\Http\Controllers\Main\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KabarController extends Controller
{
    public function index()
    {
        return view('main.Berita.Kabar.index');
    }

    public function show($id)
    {
        return view('main.Berita.Kabar.detail');
    }
}
