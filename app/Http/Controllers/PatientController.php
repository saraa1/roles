<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Questionaire;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {

        $ques = Questionaire::all();

        return view('patient.index', compact('ques'));
    }

    public function show($id)
    {

        $user = User::find($id);
        return view('patient.show', compact('user'));

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

        return redirect('/patient');

    }
    public function questionaire(){
        $ques= Questionaire::all();
        return view ('patient.questionaire.index',compact('ques'));
    }

    public function questionaire_show($id){
        $ques= Questionaire::find($id);
        return view ('patient.questionaire.show',compact('ques'));
    }
}
