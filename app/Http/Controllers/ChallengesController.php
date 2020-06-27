<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Slove;
use App\Cat;

class ChallengesController extends Controller
{
    public function show(){
        $challenges = Challenge::all();
        $cats = Cat::all();
        return view('pages.challenges', compact('cats','challenges'));
    }
}
