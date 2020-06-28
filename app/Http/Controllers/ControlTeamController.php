<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\TeamUser;

class ControlTeamController extends Controller
{
    public function join($id){

      $user = TeamUser::where('user_id',auth()->id())
                        ->count();

      if($user)
      {
        return \back()->with('danger','لايمكن الانضمام لاكثر من فريق');
      }

      TeamUser::create([
        'team_id' => $id,
        'user_id' => auth()->id()
      ]);

      return back()->with('success','بانتظار المراجعه ..');
    }

    // Leave Team
    // To Stutesc
    // Stutes One Leave  Team
    // Statuts 0 Cancle Request
    public function leave()
    {
      $team = TeamUser::where('user_id',auth()->id())
                      ->first();

      // check if user who want to leave is the
      // cretor
      if($team->team->creator == auth()->id())
      {
        return back()->with('danger',
        'يمكن للمسؤول حذف الجروب اذا اراد المغادرة'
        );
      }

      $team->delete();

      return back()->with('success','تم مغادرة الفريق بنجاح');
    }
    //Admin  approve User
    public function approve($user,$team){
        // check if the admin is request true team
        $team = Team::findOrFail($team);
        // check if user requests
        if(auth()->id() != $team->creator)
        {
          return abort(404);
        }
        // approve user
        TeamUser::where('user_id',$user)
                ->where('team_id',$team->id)
                ->update([
                  'approved' => 1
                ]);
        return back()->withSuccess('تم اضافه العضو للفريق');
    }
    // admin delete user
    public function removeuser($userID,$teamID)
    {
      // check team admin with auth()->id()
      // check if the admin is request true team
      $team = Team::findOrFail($teamID);
      // check if user requests
      if(auth()->id() != $team->creator)
      {
        return abort(404);
      }
      // check user if in this team
      // approve user
      TeamUser::where('user_id',$userID)
              ->where('team_id',$team->id)
              ->delete();
      return back()->withSuccess('تم حذف العضو');
      // remove user
    }
    // end admin
}
