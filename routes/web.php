<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::group(['middleware',['patient']],function(){

    Route::get('/patient', 'PatientController@index')->name('patient.index');
    Route::get('/patient/{patient}', 'PatientController@show');
    Route::patch('/patient/{patient}','PatientController@update');
    Route::get('/patient_questionaire','PatientController@questionaire');
    Route::get('/patient_questionaire/{id}', 'PatientController@questionaire_show');


});
Route::get('/surveys/{questionaire}-{slug}','SurveyController@show');
Route::post('/surveys/{questionaire}-{slug}','SurveyController@store');


   Route::get('/admin', 'Admin@index')->name('admin')->middleware('admin');


    Route::group(['middleware',['psychiatrist']],function(){
    Route::get('/psychiatrist', 'PsychiatristController@index')->name('psychiatrist.index');
    Route::get('/psychiatrist/{psychiatrist}', 'PsychiatristController@show');
    Route::patch('/psychiatrist/{psychiatrist}','PsychiatristController@update');

    Route::resource('/admin/questionaire','AdminQuestionaireController',['names'=>[
        'index'=>'admin.questionaire.index',
        'create'=>'admin.questionaire.create',
        'show'=>'admin.questionaire.show',

    ]]);



});


Route::group(['middleware',['admin']],function(){

//    Route::get('/admin',function (){
//
//        return view ('admin.index');
//    });

    Route::resource('/person','Admin');
    Route::resource('/admin/psychiatrist','AdminPsychiatristController',['names'=>[
        'index'=>'admin.psychiatrist.index',
        'create'=>'admin.psychiatrist.create',
        'edit'=>'admin.psychiatrist.edit'
    ]]);
    Route::resource('/admin/patient','AdminPatientController',['names'=>[
        'index'=>'admin.patient.index',
        'create'=>'admin.patient.create',
        'edit'=>'admin.patient.edit',
    ]]);
    Route::resource('/admin/appointment','AppointmentController');
    Route::resource('/admin/category','AdminCategoryController',['names'=>[
        'index'=>'admin.category.index',
        'create'=>'admin.category.create',
        'show'=>'admin.category.show'
    ]]);

    Route::get('/questionaire/{questionaire}/questions/create',['as'=>'question.create','uses'=>'QuestionController@create']);
    Route::post('/questionaire/{questionaire}/questions',['as'=>'question.store','uses'=>'QuestionController@store']);
    Route::delete('/questionaire/{questionaire}/questions/{question}',['as'=>'question.delete','uses'=>'QuestionController@destroy']);




//    Route::get('/survey_response/{id}',['as'=>'survey_response.show','uses'=>'SurveyResponseController@show']);

    Route::resource('/survey_response','SurveyResponseController');

    //for remedies
//   Route::resource('/remedy','RemediesController');
    Route::get('/questionaire/{questionaire}/remedy/create',['as'=>'remedy.create','uses'=>'RemediesController@create']);
    Route::post('/questionaire/{questionaire}/remedy',['as'=>'remedy.store','uses'=>'RemediesController@store']);
    Route::get('/remedy/{remedy}',['as'=>'remedy.show','uses'=>'RemediesController@show']);
    Route::delete('/remedy/{remedy}',['as'=>'remedy.destroy','uses'=>'RemediesController@destroy']);
    Route::patch('/remedy/{remedy}',['as'=>'remedy.update','uses'=>'RemediesController@update']);
    Route::get('/survey/{pdf}/{percentage}', 'SurveyResponseController@pdf');
    Route::get('/logout', 'Auth\LoginController@logout');

});





Route::get('/home',function (){
    return view('index');
});
