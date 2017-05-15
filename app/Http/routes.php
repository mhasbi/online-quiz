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
use App\Http\Requests;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});
Route::group(['middleware' => 'auth'], function(){
  Route::get('welcome', function () {
      return view('welcome');
  });
});
Route::get('upload', function() {
  return View::make('upload');
});
Route::post('apply/upload', 'ApplyController@upload');
Route::group(['middeware' => 'guest'], function(){
  Route::get('login', 'GuestController@getLogin');
  Route::get('register', 'GuestController@getRegister');
  Route::get('/','GuestController@getHome');
  Route::get('/home','GuestController@getHome');
});
Route::group(['middleware' => 'admin'], function(){
  Route::get('admin/questions-management','QuestionController@getQuestionsCategoryList');
  Route::get('admin/questions-management/detail/{id_question}','QuestionController@getQuestionsCategoryDetail');
  Route::get('admin/questions-management/edit-questions/','QuestionController@getQuestionsDetail');
  Route::get('admin/add-question-group','QuestionController@getCreateQuestionGroup');
  Route::post('admin/add-questions-list','QuestionController@getCreateQuestions');

  Route::get('admin/students-result','ResultController@getStudentsResultList');
  Route::get('admin/question-result','ResultController@getQuestionsResultList');
  Route::get('admin/student-result/{user_id}','ResultController@getStudentResult');
  Route::get('admin/question-result/{question_id}','ResultController@getQuestionResult');

  Route::post('admin/post/create-question-group', 'QuestionController@postCreateQuestionGroup');
  Route::post('admin/post/create-question','QuestionController@postCreateQuestions');
  Route::post('admin/post/edit-question-group', 'QuestionController@postQuestionsCategoryEditDetail');
  Route::post('admin/post/edit-questions', 'QuestionController@postQuestionsEditDetail');

});
  Route::get('admin/user-management','UserController@getUsersList');
  Route::get('admin/user-management/change-role/{role_id}/{user_id}','UserController@changeRole');
  Route::get('admin/question-management','QuestionController@getQuestionCategory');
  Route::get('admin/question-management/detail/{id_question}','QuestionController@getQuestion');
  Route::post('admin/post/edit-group-question','QuestionController@postEditQuestion');
  Route::post('admin/post/edit-questions','QuestionController@postEditQuestions');
Route::group(['middleware' => 'student'], function(){
  Route::get('questions-group-list','QuestionController@getQuestionGroupsList');
  Route::get('questions-list/{group_id}', 'QuestionController@getQuestions');
  Route::get('my-result','ResultController@getResult');

  Route::post('post/answer','QuestionController@postAnswerList');
});
//Application
Route::post('question_information/{question_id}', 'QuestionController@apiGetQuestionsDetail');

Route::group(['middleware' => 'super_admin'], function(){
  Route::get('su/user-management', 'UserController@getUsersList');
  Route::get('su/edit-user/{user_id}', 'UserController@getEditUser');
  Route::get('su/create-user','UserController@getCreateUser');

  Route::post('su/post/change-role/{user_id}','UserController@postChangeRole');
  Route::post('su/post/create-user','UserController@postCreateUser');
  Route::post('su/post/edit-user','UserController@postEditUser');
});
Route::get('questions', function(){
    return view('questions');
});
Route:get('result-students', function(){
    return view('result-students');
});

//About Questions

Route::get('testing1',function(){
  return view('layouts.master-admin');
});
Route::get('testing2',function(){
  return view('layouts.master-student');
});
Route::get('register',function(){
  return view('register');
});

Route::post('reguser','Auth\AuthController@create');

Route::get('login',function(){
  return view('login');
});
Route::post('postlogin', 'Auth\AuthController@postLogin');
Route::get('cek_login', function(){
  return Auth::user();
});
Route::get('logout',function(){
  Auth::logout();
  return view('notification')->with('message','Success!')->with('condition','You have been logged out from the system')->with('link','');
});

Route::post('get_data', function(Request $request){
  $hei = $request->input('name')[0];
  return $hei;
});
