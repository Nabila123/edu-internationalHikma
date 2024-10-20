<?php

namespace App\Http\Controllers\MainLayouting\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SejarahSekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-profile-sejarah-sekolah-read'), 403);

        return view('MainLayouting.Profile.SejarahSekolah.index');
    }
}
