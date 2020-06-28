<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function theCreator(){
      return $this->belongsTo(User::class,'creator');
    }

    public function users(){
      return
      $this->belongsToMany(User::class,TeamUser::class,'team_id','user_id')
      ->withpivot('approved');
    }

    public function user(){
      return $this->belongsTo(User::class,'creator');
    }

    public function ApprovedUsers(){
      return
      $this->belongsToMany(User::class,TeamUser::class,'team_id','user_id')
      ->withpivot('approved')
      ->where('approved',1);
    }

    public function waitToApprovedUsers(){
      return
      $this->hasMany(TeamUser::class,'team_id')
      ->where('approved',0);
    }

}
