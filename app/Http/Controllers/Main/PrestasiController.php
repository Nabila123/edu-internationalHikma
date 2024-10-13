<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        return view('main.Prestasi.index');
    }

    public function show($id)
    {
        return view('main.Prestasi.detail');
    }
}
