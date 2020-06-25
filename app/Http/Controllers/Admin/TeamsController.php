<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\TeamUser;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $users = User::all();
        return view('admin.teams.index', compact('users','teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
          'name' => 'required|min:1|max:255',
          'creator' => 'required'
        ]);

        $team = Team::create($data);

        TeamUser::create([
          'team_id' => $team->id,
          'user_id' => $data['creator'],
          'approved' => 1
        ]);

        return back()->withSuccess('تم');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $team = Team::findOrFail($id);

      $this->checkCretor($request,$team);

      $data = $request->validate([
        'name' => 'required|min:1|max:255',
        'creator' => 'required'
      ]);

      $team->update($data);

      return back()->withSuccess('تم');
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
        $team->delete();
        TeamUser::where('team_id', $team->id)->delete();
        return back()->withSuccess('تم');
    }

    //
    public function checkCretor($request,$team){
      if($request->creator != $team->creator)
      {
        $checkUser = TeamUser::where('team_id', $team->id)
                              ->where('user_id',$request->creator)
                              ->count();

        if(! $checkUser)
        TeamUser::create([
          'team_id' => $team->id,
          'user_id' => $request->creator,
          'approved' => 1,
        ]);
      }
    }
}
