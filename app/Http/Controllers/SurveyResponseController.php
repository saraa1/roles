<?php

namespace App\Http\Controllers;

use App\Questionaire;
use App\Remedies;
use App\Survey;
use App\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SurveyResponseController extends Controller
{
    //
    public function index(){

        //$response=SurveyResponse::all();


        //return view('survey_response.index',compact('response'));
    }
    public function show($id){

        $yes=DB::table('answers')
            ->select('answers.answer','answers.id','survey_responses.survey_id')
            ->join('survey_responses','answers.id','=','survey_responses.answer_id')
            ->where(['answers.answer' => 'yes'|'Yes','survey_responses.survey_id'=>$id])->count();
        $totalques=DB::table('answers')
            ->select('answer.id')
            ->join('survey_responses','answers.id','=','survey_responses.answer_id')
            ->where(['survey_responses.survey_id'=>$id])->count();
        $percentage=($yes*100)/$totalques;
//        //for finding survey from survey_id as $id=survey_id
//       $survey= Survey::where('id',$id)->get(['questionaire_id']);
//      return  Remedies::where('questionaire_id',$survey)->get(['name']);

        if($percentage>=70)
        {

            $data=DB::table('survey_responses')
                ->select('remedies.name')->distinct()
                ->join('surveys','surveys.id','=','survey_responses.survey_id')
                ->join('questionaires','questionaires.id','=','surveys.questionaire_id')
                ->join('remedies','remedies.questionaire_id','=','questionaires.id')
                ->join('categories','questionaires.category_id','=','categories.id')
                ->where(['survey_responses.survey_id'=>$id])
                ->get();


        }
        else if($percentage<70 && $percentage>=50)
        {

            $data=DB::table('survey_responses')
                ->select('remedies.name')
                ->join('surveys','surveys.id','=','survey_responses.survey_id')
                ->join('questionaires','questionaires.id','=','surveys.questionaire_id')
                ->join('remedies','remedies.questionaire_id','=','questionaires.id')
                ->join('categories','questionaires.category_id','=','categories.id')
                ->where(['survey_responses.survey_id'=>$id])
                ->limit(1)
                ->get();

        }
        else
        {
            $data=null;
        }
        if(Auth::user()->role->name=='patient')
        {

            return view('survey_response.show',compact('data','percentage','id'));
        }
        else{
            return view('survey_response.show2',compact('data','percentage','id'));
        }


    }







    public function get_data($id){

    }
    public function pdf($id,$percentage){

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_data_to_html($id,$percentage));
        return $pdf->stream();
    }
    public function convert_data_to_html($id,$percentage)
    {

        if($percentage>=70)
        {

            $data=DB::table('survey_responses')
                ->select('remedies.name')->distinct()
                ->join('surveys','surveys.id','=','survey_responses.survey_id')
                ->join('questionaires','questionaires.id','=','surveys.questionaire_id')
                ->join('remedies','remedies.questionaire_id','=','questionaires.id')
                ->join('categories','questionaires.category_id','=','categories.id')
                ->where(['survey_responses.survey_id'=>$id])
                ->get();
            $result = 'Poor';



        }
        else if($percentage<70 && $percentage>=50)
        {

            $data=DB::table('survey_responses')
                ->select('remedies.name')
                ->join('surveys','surveys.id','=','survey_responses.survey_id')
                ->join('questionaires','questionaires.id','=','surveys.questionaire_id')
                ->join('remedies','remedies.questionaire_id','=','questionaires.id')
                ->join('categories','questionaires.category_id','=','categories.id')
                ->where(['survey_responses.survey_id'=>$id])
                ->limit(1)
                ->get();
            $result= 'Average';

        }
        else
        {
            $data=null;
        }
        $user=Auth::user();

        $output = '
     <h3 align="center">Patient Record</h3>
     <h3 >Patient Name:<small>' .$user->name.'</small>
     </h3>
      <h3>Calculated Result: '.$result.' </h3>
     <br>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Remedy</th>
 
   </tr>
     ';
        foreach($data as $key=> $data)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.($key+1).'-'. $data->name.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}

