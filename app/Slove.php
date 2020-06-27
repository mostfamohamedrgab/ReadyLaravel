<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slove extends Model
{
    protected $guarded = [];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function Challenge(){
      return $this->belogsTo(Challenge::class);
    }
}
