<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index(){
      $news = News::orderBy('id','desc')->get();
      return view('pages.news', compact('news'));
    }

    // show
    public function show($id)
    {
      $new = News::findOrFail($id);
      return view('pages.new', \compact('new'));
    }
}
