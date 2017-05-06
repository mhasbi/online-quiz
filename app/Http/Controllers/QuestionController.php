<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;
use App\QuestionCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function getAllListQuestions(){
      $questionsList = QuestionCategory::get();
      return view('quiz-list')->with('questionsList',$questionsList);
    }
    public function getAllQuestions(){
      $questionsList = Question::where('id_category',3)->get();
      $optionsList = Option::get();
      return view('questions')->with('options', $optionsList)->with('questions',$questionsList);
    }
}
