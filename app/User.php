<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function challangesSloved(){
      return $this->belongsToMany(
        Challenge::class,
        Slove::class,
      );
    }

    public function approvedTeams(){
      return $this->belongsToMany(
        Team::class,
        TeamUser::class
      )->withpivot('approved')
      ->where('approved',1);
    }

    public function Teams(){
      return $this->belongsToMany(
        Team::class,
        TeamUser::class
      )->withpivot('approved');
    }
    // the team that the user In
    public function TeamsJoined(){
      return $this->hasMany(TeamUser::class);
    }

    public function sloves(){
      return $this->hasMany(Slove::class);
    }
}
