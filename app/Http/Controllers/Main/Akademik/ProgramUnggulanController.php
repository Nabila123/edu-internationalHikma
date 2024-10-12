<?php

namespace App\Http\Controllers\Main\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramUnggulanController extends Controller
{
    public function index()
    {
        return view('main.Akademik.ProgramUnggulan.index');
    }
}
