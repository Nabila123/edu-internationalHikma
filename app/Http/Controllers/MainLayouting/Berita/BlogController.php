<?php

namespace App\Http\Controllers\MainLayouting\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-berita-blog-read'), 403);

        return view('MainLayouting.Berita.Blog.index');
    }
}
