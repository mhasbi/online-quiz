<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use App\Question;
use App\Option;
use App\QuizTaken;
use App\Answer;
use App\User;
use Auth;
use App\QuestionCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function apiGetQuestionDetail($q_id, $user_id){
    }
    public function getDeleteQuestion($q_id){
      $questionCategory = QuestionCategory::where('id',$q_id)->first();
      $questions = Question::where('id_category',$questionCategory->id)->get();
      $questionCategory->delete();
      foreach($questions as $question){
        $question->delete();
      }
      $notification['message'] = "You have deleted a Question List ";
      $notification['condition'] ="Success";
      $questionList = QuestionCategory::get();
      return view('admin-view.question-management')->with('questionList', $questionList)->with('notification', $notification);
    }
    public function getQuestionGroupsList($id){
      $question_categories = QuestionCategory::where('q_group',$id)->get();

      $questions = Question::get();
      $user = User::where('id',Auth::id())->first();
      $user->choosen_quiz = $id;
      $user->save();
      return view('quiz-list')->with('questionsList', $question_categories);
    }
    public function addQuestionGroup(){
        return view('admin-view.add-question-group');
    }
    public function postQuestionGroup(Request $request){
        $newQuestionGroup = new QuestionCategory;
        $newQuestionGroup->name = $request->input('name');
        $newQuestionGroup->description = $request->input('description');
        $newQuestionGroup->duration = $request->input('duration');
        $newQuestionGroup->q_group = $request->input('group');
        if($newQuestionGroup->save()){
          return view('admin-view.add-questions')->with('question_group', $newQuestionGroup)->with('number',$request->input('number'));
        }
    }
    public function postQuestions(Request $request){
      $image_path = "uploads";
      $i = 0;
      foreach($request->input('question') as $question){
        $newQuestion = new Question;
        $newQuestion->question = $question;
        $newQuestion->correct_answer = $request->input('correct_answer')[$i];
        $date = date('Y-m-d-h-i-s').$i;
        $file = $request->file('q_image')[$i];
        if($file){
          $file->move($image_path, $date.".".$file->getClientOriginalExtension());
          $newQuestion->file_image = $image_path."/".$date.".".$file->getClientOriginalExtension();
        }
        $newQuestion->id_category = $request->input('id');
        $newQuestion->save();
        for($j=1;$j<6;$j++){
          $newOption = new Option;
          $newOption->statement = $request->input('option')[$i*5+$j];
          $newOption->id_question = $newQuestion->id;

          $file = $request->file('opt_image')[$i*5+$j];
          $date = date('Y-m-d-h-i-s').$i.$j;
          if($file){
            $file->move($image_path, $date.".".$file->getClientOriginalExtension());
            $newOption->file_image = $image_path."/".$date.".".$file->getClientOriginalExtension();
          }
          $newOption->save();
        }
      }
      $questionList = QuestionCategory::get();

      $notification['message'] = "You have added a new Question List ";

      $notification['condition'] ="Success";
      return view('admin-view.question-management')->with('questionList', $questionList)->with('notification', $notification);
    }
    public function getQuestionCategory(){
      $questionList = QuestionCategory::get();
      return view('admin-view.question-management')->with('questionList', $questionList);
    }
    public function getQuestion($question_id){
      $question = QuestionCategory::where('id',$question_id)->first();
      $q = Question::where('id_category',$question->id)->get();
      $number = count($q);
      return view('admin-view.edit-question-group')->with('id_category',$question_id)->with('question',$question)->with('number',$number);
    }
    public function postEditQuestion(Request $request){
      //return $request->all();
      $question_group = QuestionCategory::where('id', $request->input('id'))->first();
      $question_group->duration = $request->input('duration');
      $question_group->name = $request->input('name');
      $question_group->description = $request->input('description');
      $question_group->q_group = $request->input('group');
      $question_group->save();
      $questions = Question::where('id_category', $question_group->id)->get();
      $options = Option::get();
      return view('admin-view.edit-questions')->with('questions', $questions)->with('question_group',$question_group)->with('number', $request->input('number'))->with('options',$options);
    }
    public function postEditQuestions(Request $request){
      $image_path = "uploads";
      $i = 0;
      foreach($request->input('question') as $question){
        if(isset($request->input('q_id')[$i])){
          $newQuestion = Question::where('id', $request->input('q_id')[$i])->first();
        }
        else{
          $newQuestion = new Question;
        }
        $newQuestion->question = $question;
        $newQuestion->correct_answer = $request->input('correct_answer')[$i];
        $date = date('Y-m-d-h-i-s').$i;
        $file = $request->file('q_image')[$i];
        if($file){
          $file->move($image_path, $date.".".$file->getClientOriginalExtension());
          $newQuestion->file_image = $image_path."/".$date.".".$file->getClientOriginalExtension();
        }
        $newQuestion->id_category = $request->input('id');
        $newQuestion->save();
        for($j=1;$j<6;$j++){
          if(isset($request->input('opt_id')[$i*5+$j]))
            $newOption = Option::where('id',$request->input('opt_id')[$i*5+$j])->first();
          else
          $newOption = new Option;
          $newOption->statement = $request->input('option')[$i*5+$j];
          $newOption->id_question = $newQuestion->id;

          $file = $request->file('opt_image')[$i*5+$j];
          $date = date('Y-m-d-h-i-s').$i.$j;
          if($file){
            $file->move($image_path, $date.".".$file->getClientOriginalExtension());
            $newOption->file_image = $image_path."/".$date.".".$file->getClientOriginalExtension();
          }
          $newOption->save();
        }
        $i++;
      }
      $notification['message'] = "You have edited a Question List ";
      $notification['condition'] ="Success";
      $questionList = QuestionCategory::get();
      return view('admin-view.question-management')->with('questionList', $questionList)->with('notification', $notification);
    }
    public function getQuestions($quiz_id){
      $date = date('Y-m-d h:i:s');
      $question = QuestionCategory::where('id',$quiz_id)->first();
      $duration = $question->duration;
      $due_date = strtotime($date . " + ".$question->duration." minutes");
      $new_quiz_taken = QuizTaken::where('id_question_category',$quiz_id)->where('id_user',Auth::user()->id)->first();
      if(!$new_quiz_taken)
        $new_quiz_taken = new QuizTaken;
      $new_quiz_taken->id_user = Auth::id();
      $new_quiz_taken->id_question_category = $quiz_id;
      $new_quiz_taken->time_started = $date;
      $new_quiz_taken->time_expected_finished = date('Y-m-d h:i:s',$due_date);
      $new_quiz_taken->save();
      $questionsList = Question::where('id_category',$quiz_id)->get();
      $optionsList = Option::get();
      return view('questions')->with('duration',$duration)->with('options', $optionsList)->with('questions',$questionsList)->with('quiz_taken_id',$new_quiz_taken->id);
    }
    public function postAnswerList(Request $request){
      $new_quiz_taken = QuizTaken::where('id', $request->input('quizTakenID'))->first();
      $itr = 0;
      $questions = $request->input('questionsIDList');
      $old_answers = Answer::where('id_quiz_taken',$request->input('quizTakenID'))->get();
      if($old_answers){
        foreach($old_answers as $old_answer){
          $old_answer->delete();
        }
      }

      foreach($questions as $question){
        $new_answer = new Answer;
        $new_answer->id_quiz_taken = $new_quiz_taken->id;
        $new_answer->id_question = $question;
        if(isset($request->input('answersList')[$itr]))
          $new_answer->choosen_answer = $request->input('answersList')[$itr];
        else
          $new_answer->choosen_answer = 0;
        $new_answer->save();
        $itr++;
      }
      return view('notification')->with('message','Success!')->with('condition','You have finished a question set')->with('link',url('/my-result'));
    }
    public function getQuestionsCategoryList(){
        $question_categories = QuestionCategory::get();
        $questions = Question::get();
        return view('question_management')->with('question_categories',$question_categories)->with('questions', $questions);
    }
    public function getCreateQuestionGroup(){
        return view('add-question-group');
    }
    public function getCreateQuestions(Request $request){
        $new_question_category = new QuestionCategory;
        $new_question_category->name = $request->input('name');
        $new_question_category->description = $request->input('description');
        $new_question_category->duration = $request->input('duration');
        $new_question_category->save();
        return view('upload')->with('question_category', $new_question_category)->with('numbers',$request->input('numbers'));
    }
    public function postCreateQuestionGroup(Request $request){
      $file = array('image' => Input::file('image'));
      // setting up rules
      $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
        return "fail-not-valid";
      }
      else {
        // checking file is valid.
        if (Input::file('image')->isValid()) {
          $destinationPath = 'uploads'; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
          Session::flash('success', 'Upload successfully');
          return "sukses";
        }
        else {
          // sending back with error message.
          Session::flash('error', 'uploaded file is not valid');
          return "fail";
        }
      }
      return "aloha";
          $itr = 1;
          $itrq = 0;
          foreach($request->input('description') as $question){
            $newQuestion = new Question;
            $newQuestion->question = $question;
            $newQuestion->correct_answer = $request->input('corrected')[$itrq];
            $newQuestion->id_category = $request->input('id_category');
            $newQuestion->save();
            $itrq++;
            $isfourth = 0;
            while($isfourth != 5){
              $newOption = new Option;
              $newOption->id_question = $newQuestion->id;
              $newOption->statement = $request->input('options')[$itr];
              $itr++;
              $isfourth++;
              $newOption->save();
            }

          }
          return view('success')->with('message','A new question group has been made...')->with('link',url('/admin/questions-managemen'));
    }
    public function getQuestionsCategoryDetail($questionGroup_id){
        $questionGroup = QuestionCategory::where('id', $questionGroup_id)->first();
        $questions = Question::where('id_category', $questionGroup->id)->get();
        return view('edit-question-group')->with('questionGroup', $questionGroup)->with('number_of_question', count($questions));
    }
    public function postQuestionsCategoryEditDetail(Request $request){
        $editedQuestionCategory = QuestionCategory::where('id', $request->input('id'))->first();
        $editedQuestionCategory->name = $request->input('name');
        $editedQuestionCategory->duration = $request->input('duration');
        $editedQuestionCategory->description = $request->input('description');
        $editedQuestionCategory->save();
        $questions = Question::where('id_category',$request->input('id'))->get();
        $options = Option::get();
        $numbers = $request->input('numbers');
        return view('edit_questions')->with('options',$options)->with('questions',$questions)->with('question_category',$editedQuestionCategory)->with('numbers',$numbers);

    }
    public function postQuestionsEditDetail(Request $request){
        $itr = 1;
        $itrq = 0;
        foreach($request->input('description') as $question){
          if(isset($request->input('id_question')[$itrq]))
            $newQuestion = Question::where('id',$request->input('id_question')[$itrq])->first();
          else
            $newQuestion = new Question;
          $newQuestion->question = $question;
          $newQuestion->correct_answer = $request->input('corrected')[$itrq];
          $newQuestion->id_category = $request->input('id_category');
          $newQuestion->save();
          $itrq++;

          while($itr % 5 <> 0){
            if(isset($request->input('option_id')[$itr]))
              $newOption = Option::where('id',$request->input('option_id')[$itr])->first();
            else
              $newOption = new Option;
            $newOption->id_question = $newQuestion->id;
            $newOption->statement = $request->input('options')[$itr];
            $itr++;
            $newOption->save();
          }

        }
        return view('notification')->with('message','Success!')->with('condition','You have been logged out from the system')->with('link',url('/admin/questions-management'));
    }
}
