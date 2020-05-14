<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Question;
use App\Questionaire;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminQuestionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ques = Questionaire::all();


        return view ('admin.questionaire.index',compact('ques'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category= Category::pluck('name','id')->all();
        return view ('admin.questionaire.create',compact('category'));
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
            'category_id'=>'required',
            'body' =>'required'

        ]);
        Questionaire::create($request->all());
        return redirect('admin/questionaire');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Questionaire $questionaire)
    {
        //
        $ques=$questionaire->load('question.answer');
        return view('admin.questionaire.show',compact('ques'));

//        $ques = Questionaire::where('category_id',$id)->get();
//        return view ('admin.questions.show',compact('ques'));

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionaire $questionaire)
    {
        //
        $ques=Question::where('questionaire_id',$questionaire->id)->first();
        Answer::where('question_id',$ques->id)->delete();
        $questionaire->question()->delete();
        $questionaire->delete();


        return redirect()->back();


    }
}
