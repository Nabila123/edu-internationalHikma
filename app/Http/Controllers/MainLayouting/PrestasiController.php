<?php

namespace App\Http\Controllers\MainLayouting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-prestasi-read'), 403);

        return view('MainLayouting.Prestasi.index');
    }
}
