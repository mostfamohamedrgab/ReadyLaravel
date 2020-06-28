<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamUser;
use Illuminate\Http\Request;
use App\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      return view('team.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => "required|min:2|max:255",
          'users' => "nullable|array"
        ]);
        // Create Team
        $team = Team::create([
          'name' => $request->name,
          'creator' => auth()->id()
        ]);
        // Add users
        $users = !empty($request->users) ? $request->users : [];
        // add creator to groupUsers
        array_push($users,auth()->id());


        foreach($users as $user)
        {
          TeamUser::create([
            'team_id' => $team->id,
            'user_id' => $user,
            'approved' => 1
          ]);
        }

        return back()->withSuccess(' تم انشاء فريق '.$team->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
