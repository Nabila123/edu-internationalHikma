<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KarierController extends Controller
{
    public function index()
    {
        return view('main.Karier.index');
    }

    public function show($id)
    {
        return view('main.Karier.detail');
    }
}
