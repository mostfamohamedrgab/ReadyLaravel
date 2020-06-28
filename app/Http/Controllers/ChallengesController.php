<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Slove;
use App\Cat;
use App\User;

class ChallengesController extends Controller
{
    public function __constrcut(){
      $this->middleware('auth')->except(['show']);
    }

    public function show(){
        $challenges = Challenge::all();
        $cats = Cat::all();
        return view('pages.challenges', compact('cats','challenges'));
    }
    // Logic
    // ** check status teams , users !!
    // 1 => approve Challange_id
    // 2 => check if user Sloved
    // 3 => get Challange points and value
    // 4 => check if user write true value
    // 5 => add poitnts to user
    // 6 => add this operation to slove
    public function slove(Request $request)
    {
        $challenge_id = $request->challenge_id;
        // false if he send fa  ce challnege_id
        $challenge = Challenge::findOrFail($challenge_id);

        // 1 check status
        // team
        // check if he has a team
        // check if there is any one form this team slove it before
        $userTeam = auth()->user()->Teams;
        if($challenge->type == 'teams')
        {
            // check if user has a team
            if(!$userTeam->count())
            {
              return $this->goBack('info','عفوا الاختبار مخصص للفرق فقط');
            }

            // check if any one form team slove it
            $teamUsers = $userTeam->first()->users->pluck('id');
            $sloveCount = Slove::whereIn('user_id', $teamUsers)
                   ->where('challenge_id',$challenge->id)
                   ->count();
             if($sloveCount)
             {
               return $this->goBack('info','قام صديق لك بحل الاختبار سابقا');
             }
        }
        // 2 user
        // check if he dosnt has any teams
        if($challenge->type == 'users')
        {
            if($userTeam->count())
            {
              return $this->goBack('info',"معذره التحدي للاعضاء بدون فريق");
            }
        }

        $data = $request->validate([
          'value' => 'required',
          'challenge_id' => 'required'
        ],[
          'value.required' => 'القيمه الصحيحة مطلوبه',
          'value.challenge_id' =>  'رمز مفقود !'
        ]);
        /** Check If User Sloved Challange Before **/
        if($this->isSloved($challenge_id))
        {
          return $this->goBack('danger','لقد قمت بحل التحدي من قبل !!');
        }
        // get chllange point
        $challenge =  Challenge::select('id','points','value')
                    ->where('id', $challenge_id)
                    ->first();
        // Compare Challange Value With Input ()
        if($request->value != $challenge->value )
        {
          return $this->goBack('danger','القيمة غير صحيحة !');
        }

        $user =   auth()->user();
        // add points to user
        User::where('id',$user->id)->update([
          'points' => $user->points + $challenge->points
        ]);
        // add oprtaion to slove
        Slove::create([
          'challenge_id' => $challenge->id,
          'user_id' => $user->id
        ]);
        // back with suucess operation
        return $this->goBack('success',
        'مبروك تم أضافه '.$challenge->points.' نقطه بنجاح');
    }

    // check if sloved
    public function isSloved($challenge_id){
      $isSloved = Slove::where('user_id', auth()->id())
                         ->where('challenge_id', $challenge_id)
                         ->count();
      if($isSloved)
      {
        return true;
      }
      return false;
    }
    // go back with messge
    public function goBack($type,$msg)
    {
      return back()->with($type,$msg);
    }
}
