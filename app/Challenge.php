<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Challenge extends Model
{
    protected $guarded = [];

    public function getEndAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
