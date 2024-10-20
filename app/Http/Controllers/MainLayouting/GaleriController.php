<?php

namespace App\Http\Controllers\MainLayouting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-galeri-read'), 403);

        return view('MainLayouting.Galeri.index');
    }
}
