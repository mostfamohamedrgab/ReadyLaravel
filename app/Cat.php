<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $guarded = [];

    public function challenges(){
      return $this->hasMany(Challenge::class);
    }
}
