<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Ad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::limit(6)->get();
        $ads = Ad::all();

        return view('home', \compact('news','ads'));
    }
}
