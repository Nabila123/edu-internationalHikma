<?php

namespace App\Http\Controllers\Main\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SejarahSekolahController extends Controller
{
    public function index()
    {
        return view('main.Profile.SejarahSekolah.index');
    }
}
