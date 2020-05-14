<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','role_id','is_active', 'photo_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }
    public function photo(){

        return $this->belongsTo('App\Photo');
    }
    public function isAdmin(){

        if($this->role->name== 'admin' ){

            return true;
        }

        return false;
    }
    public function isPatient(){

        if($this->role->name== 'patient' ){

            return true;
        }

        return false;
    }
    public function isPsychiatrist(){

        if($this->role->name== 'psychiatrist' ){

            return true;
        }

        return false;
    }

}
