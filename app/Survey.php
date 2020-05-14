<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable=['questionaire_id','name','email'];

    public function questionnaire(){

        return $this->belongsTo('App\Questionaire');
    }

    public function response(){

        return $this->hasMany('App\SurveyResponse');
    }
}
