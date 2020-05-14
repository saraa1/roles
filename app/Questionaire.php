<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    //
    protected $fillable=['category_id','body'];

    public function question(){

        return $this->hasMany('App\Question');
    }
    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function survey(){

        return $this->hasMany('App\Survey');
    }
    public function remedy(){

        return $this->hasMany('App\Remedies');
    }



}

