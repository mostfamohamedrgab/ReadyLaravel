<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $guarded = [];

    public function sloves(){
      return $this->hasMany(Slove::class);
    }

    public function cat(){
      return $this->belongsTo(Cat::class);
    }

}
