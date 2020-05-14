<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\RemedyRequest;
use App\Http\Requests\ValidateSurvey;
use App\Question;
use App\Questionaire;
use App\Remedies;
use Illuminate\Http\Request;

use App\Http\Requests;

class RemediesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Questionaire $questionaire)
    {
        //
    // ($questionaire);
       $remedy=Remedies::where('questionaire_id',$questionaire->id)->get();

        return view ('remedies.create',compact('questionaire','remedy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Questionaire $questionaire,Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',

        ]);

        $data=$request->all();

        Remedies::create($data);
        // for displaying remedies
        //$remedy=Remedies::all();
       return redirect()->back();






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
        $remedy= Remedies::find($id);
        return view('remedies.show',compact('remedy'));


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

        ]);

        $data=$request->all();
       $rem=Remedies::find($id)->update($data);
       return redirect('/admin/questionaire');
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
        Remedies::find($id)->delete();
        return redirect('/admin/questionaire');
    }
}
