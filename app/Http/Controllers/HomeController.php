<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.app');
    }

    public function setting()
    {
        return view('account.settings');
    }

    public function overview()
    {
        return view('account.view');
    }

    public function users()
    {
        return view('settings.users-manage.index');
    }

    public function permissions()
    {
        return view('settings.permissions.index');
    }
}
