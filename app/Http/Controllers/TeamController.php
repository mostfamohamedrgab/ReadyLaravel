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
        $user = auth()->user();
        $UserTeam = $user->Teams->first();

        return view('team.index', compact('UserTeam','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      $team  = auth()->user()->TeamsJoined;
      return view('team.create', compact('users','team'));
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
          'name' => "required|regex:/^[\pL\s\-]+$/u|min:2|max:255",
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
          $this->checkUser($user,$team->id);
        }

        return back()->withSuccess(' تم انشاء فريق '.$team->name);
    }

    /**
    ** Check If User In Any Group
    ** In Not Add Him Else Prevent
    **/
    public function checkUser($userId,$team)
    {
      $user = TeamUser::where('user_id',$userId)
                      ->count();
      if(! $user)
      {
        TeamUser::create([
          'team_id' => $team,
          'user_id' => $userId,
          'approved' => 1
        ]);
      }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::where('id',$id)->with('users')->first();
        // if not cretor 404

        if($team->creator != auth()->id())
        {
          return abort(404);
        }

        return view('team.show', compact('team'));
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
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        // check if he creator
        if(auth()->id() != $team->creator)
        {
            return redirect('/');
        }

        $team->delete();
        return redirect()->route('Team.index');
    }
}
