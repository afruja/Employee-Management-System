<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiveAward extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

     public function awardCategory(){
        return $this->belongsTo(AwardCategory::class);
    }
}
