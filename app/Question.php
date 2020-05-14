<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=['questionaire_id','question'];

    public function answer(){

        return $this->hasMany('App\Answer');
    }

    public function questionaire(){

        return $this->belongsTo('App\Questionaire');
    }
}
