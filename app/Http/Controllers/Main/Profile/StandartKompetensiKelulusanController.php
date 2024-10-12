<?php

namespace App\Http\Controllers\Main\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandartKompetensiKelulusanController extends Controller
{
    public function index()
    {
        return view('main.Profile.StandartKompetensi.index');
    }
}
