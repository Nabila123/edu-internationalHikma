<?php

namespace App\Http\Controllers\MainLayouting\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AsramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-akademik-asrama-read'), 403);

        return view('MainLayouting.Akademik.Asrama.index');
    }
}
