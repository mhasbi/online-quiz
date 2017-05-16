<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizTaken;
use App\QuestionCategory;
use App\Question;
use App\Http\Requests;
use App\Answer;
use App\Option;
use Auth;
use DB;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{

    public function getResult(){
      $user = Auth::user();
      $questionCategories = QuestionCategory::get();
      $questions = Question::get();
      $questionsGroup = QuestionCategory::get();
      $answers = Answer::get();
      foreach($answers as $answer){
        $answer->id_question = $questions->where('id',$answer->id_question)->first();
      }
      $quiz_taken = QuizTaken::where('id_user', $user->id)->get();
      foreach ($quiz_taken as $quiz) {
        $quiz->id_user = $user;
        $quiz->result = $answers->where('id_quiz_taken',$quiz->id);
        $quiz->question_group = $questionsGroup->where('id',$quiz->id_question_category)->first();
      }
      return view('my-result')->with('results', $quiz_taken);
    }
    public function getResultByQuestion(){
      $allQuestionGroup = QuestionCategory::get();
      foreach($allQuestionGroup as $questionGroup){
          $questions = Question::where('id_category',$questionGroup->id)->get();
          $questionGroup->questions = $questions;
          $totalScore = 0;
          $number = 0;
          foreach($questionGroup->questions as $question){
            $answers = Answer::where('id_question',$question->id)->get();
            $question->answers = $answers;

          }
      }
      return $allQuestionGroup;
    }
    public function getResultByUser(){
      $allUser = User::where('role',0)->get();
      foreach($allUser as $user){
      }
    }
}
