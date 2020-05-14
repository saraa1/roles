<?php

namespace App\Http\Controllers;


use App\Http\Requests\ValidateSurveyRequest;
use App\Questionaire;
use App\Survey;
use App\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use  App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class SurveyController extends Controller
{
    //
    use ValidatesRequests;

    public function show(Questionaire $questionaire, $slug)
    {


        $user = Auth::user();
        if($user->role->name=='patient'){
            $questionaire->load('question.answer');
            return view('survey.show', compact('questionaire', 'slug', 'user'));

        }
        else{
            $questionaire->load('question.answer');
            return view('survey.show2', compact('questionaire', 'slug', 'user'));
        }




    }



    public function store(Questionaire $questionaire, $slug,Request $request)
    {

        $user = Auth::user();
        //dd(request()->get('answer'));
        $loop = request()->get('answer');
        $id = $questionaire->id;
        $sur = Survey::create(['questionaire_id' => $id, 'name' => $user->name, 'email' => $user->email]);
//
        foreach ($loop as $value) {
            $survey = new SurveyResponse();
            $survey->survey_id = $sur->id;
            $survey->answer_id = $value;
            $survey->save();


        }
        $id = $sur->id;
            return redirect()->action(
                'SurveyResponseController@show', ['id' => $id]
            );

    }



}
