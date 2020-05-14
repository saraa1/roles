<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    //
    protected $fillable=['answer_id','survey_id'];
    public function survey(){

        return $this->belongsTo('App\Survey');
    }
    public function answer(){

        return $this->belongsTo('App\Answer');
    }
}
