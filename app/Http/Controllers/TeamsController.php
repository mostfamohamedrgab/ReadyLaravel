<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    public function index()
    {
      $teams = Team::all();
      foreach($teams as $team)
      {
        $team->points = $team->ApprovedUsers->sum('points');
        $team->added = $team->created_at->diffForHumans();
      }

      $teams = $teams->sortBy('points',SORT_REGULAR,true);
      return view('teams.index', compact('teams'));
    }

    public function show(Team $Team)
    {
      $Team->points = $Team->ApprovedUsers->sum('points');
      $Team->ApprovedUsers = $Team->ApprovedUsers->sortBy('points',SORT_REGULAR,true);
      return view('teams.show', compact('Team'));
    }
}
