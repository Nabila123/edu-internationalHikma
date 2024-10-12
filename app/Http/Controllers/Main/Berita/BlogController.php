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
}
