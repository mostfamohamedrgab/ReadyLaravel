<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;

class DashboardController extends Controller
{
    public function index(){
      $teams = Team::all();
      return view('admin.index', compact('teams'));
    }
}
