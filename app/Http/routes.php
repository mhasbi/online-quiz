<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('welcome', function () {
    return view('welcome');
});
Route::get('questions', function(){
    return view('questions');
});
Route:get('result-students', function(){
    return view('result-students');
});

//About Questions
Route::get('quiz-list','QuestionController@getAllListQuestions');
Route::get('questions','QuestionController@getAllQuestions');
Route::post('post_answer','AnswerController@postQuestionAnswers');

Route::get('login','AuthController@login_page');
Route::post('postLogin', 'AuthController@login');
