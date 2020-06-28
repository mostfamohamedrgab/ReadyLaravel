<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $guarded = [];

    public function sloves(){
      return $this->hasMany(Slove::class);
    }

    public function users(){
      return $this->belongsToMany(
        User::class,
        Slove::class,
        'challenge_id',
        'user_id',
        'id',
        'id'
        );
    }

    public function cat(){
      return $this->belongsTo(Cat::class);
    }

}
