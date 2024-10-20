<?php

namespace App\Http\Controllers\MainLayouting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-kontak-read'), 403);

        return view('MainLayouting.KontakKami.index');
    }
}
