<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminPsychiatristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $psych = User::where('role_id',3)->get();
        return view('admin.psychiatrist.index',compact('psych'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.psychiatrist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email' =>'required',
            'password'=>'required',
            'is_active'=>'required'
        ]);
        $input=$request->all();
        if($file=$request->file('photo_id')){

            $name= $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['role_id']=3;

        User::create($input);

        return redirect('/admin/psychiatrist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user= User::find($id);
        return view('admin.psychiatrist.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email' =>'required',
            'password'=>'required',
            'is_active'=>'required'
        ]);
        $input=$request->all();
        if($file=$request->file('photo_id')){

            $name= $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['role_id']=3;

        $user=User::find($id)->update($input);
        Session::flash('updated_user','the  record has been updated');

        return redirect('admin/psychiatrist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::find($id);
        if($user->photo){

            unlink(public_path().$user->photo->path);
        }
        $user->delete();
        Session::flash('updated_user','the  record has been updated');
        return redirect('admin/psychiatrist');
    }
}
