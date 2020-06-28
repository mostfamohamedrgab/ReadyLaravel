<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamUser;

class JoinTeamController extends Controller
{
    public function join($id){
      TeamUser::create([
        'team_id' => $id,
        'user_id' => auth()->id()
      ]);
      return back()->with('success','بانتظار المراجعه ..');
    }
}
