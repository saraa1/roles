<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class PsychiatristController extends Controller
{
    //
    public function index(){

        return view('psychiatrist.index');
    }

    public function show($id)
    {

        $user = User::find($id);
        return view('psychiatrist.show', compact('user'));

    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email' =>'required',
            'password'=>'required',
            'is_active'=>'required'
        ]);
        $input = $request->all();
        if ($file = $request->file('photo_id')) {

            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user = User::find($id)->update($input);

        return redirect('/psychiatrist');

    }
}

