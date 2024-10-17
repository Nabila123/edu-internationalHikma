<?php

namespace App\Http\Controllers\Main\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('main.Berita.Blog.index');
    }

    public function show($id)
    {
        return view('main.Berita.Blog.detail');
    }
}
