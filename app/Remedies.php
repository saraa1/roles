<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remedies extends Model
{
    //
    protected $fillable=['questionaire_id','name'];

    public function questionaire(){

        return $this->belongsTo('App\Questionaire');
    }
}
