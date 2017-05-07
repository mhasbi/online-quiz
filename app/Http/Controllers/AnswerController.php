<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
  public function postQuestionAnswers(Request $request){
    $questionsIDList = $request->input('questionsIDList');
    $answersList = $request->input('answersList');

    $itr = 0;
    foreach($questionsIDList as $questionID){
      echo $questionID. " ". $answersList[$itr]." | ";
      $itr++;
    }
  }
}
