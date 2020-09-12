<?php

namespace App\Http\Controllers;

use App\Http\Spatie\AutoGenerate;
use App\Suports\Sidebar\LoadMenus;
use App\Suports\Sidebar\LoadNav;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        dd(AutoGenerate::make()->routes()->menus()->navigations()->toArray());
        return view('home');
    }
}
