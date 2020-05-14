<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Questionaire;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    //
    public function create(Questionaire $questionaire){


        return view('admin.questions.create',compact('questionaire'));

    }

    public function store(Questionaire $questionaire, Request $request){
//       dd(request()->all());
        $this->validate($request,[
            'questionaire_id'=>'required',
            'question'=>'required'
        ]);

        $data= $request->all();
       $question=$questionaire->question()->create($data['question']);
       $question->answer()->createMany($data['answers']);
       return redirect('admin/questionaire ');

    }
    public function destroy(Questionaire $questionaire,Question $question){

        $question->answer()->delete();
        $question->delete();
        return redirect()->back();
    }
}
