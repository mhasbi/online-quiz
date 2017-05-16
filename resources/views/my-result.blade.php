@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <br><br>
        <h3 class="header center">Your Quiz Result</h3>
          <div class="collection with-header">

            <div class="collection-item">
            <table class="bordered striped red lighten-1" id="table_id">
              <thead>
                <tr class="white-text">
                    <th>No.</th>
                    <th>Quiz Name</th>
                    <th>Date Taken</th>
                    <th>Time Taken</th>
                    <th>Correct</th>
                    <th>Incorrect</th>
                    <th>No Answer</th>
                    <th>Score</th>
                </tr>
              </thead>

              <tbody>
                <?php $no = 1;
                      $totalScore= 0;
                      $correct = 0;
                      $incorrect = 0;
                      $skip = 0;
                ?>
                @foreach($results as $result)
                  <tr>
                    <td>{{$no++ . "."}}</td>
                    <td>{{$result->question_group->name}}</td>
                    <td class="centered">{{$result->time_started}}</td>
                    <td>{{date("h:i",strtotime($result->time_expected_finished) - strtotime($result->time_started))}}</td>
                    <?php $scores = 0; $num_of_questions = 0; ?>
                    @foreach($result->result as $score)
                      @if($score->choosen_answer == 0)
                        <?php $skip += 1;?>
                      @elseif($score->id_question->correct_answer == $score->choosen_answer)
                        <?php $correct += 1;?>
                      @else
                        <?php $incorrect += 1;?>
                      @endif
                      <?php $num_of_questions++;?>
                    @endforeach
                    <td>{{$correct}}</td>
                    <td>{{$incorrect}}</td>
                    <td>{{$skip}}</td>
                    @if($num_of_questions != 0)
                      @if(round(((($correct *4)- $incorrect) * 100)/($num_of_questions *4), 2) > 0)
                        <td>{{round(((($correct *4)- $incorrect) * 100)/($num_of_questions *4), 2)}}</td>
                        <?php $totalScore += round(((($correct *4)- $incorrect) * 100)/($num_of_questions *4), 2); ?>
                      @else
                        <td>0</td>
                      @endif
                    @else
                      <td>0.00</td>
                    @endif
                      <?php
                        $scores = 0;
                        $num_of_questions = 0;
                        $avgScore= 0;
                        $correct = 0;
                        $incorrect = 0;
                        $skip = 0;
                      ?>
                  </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <div class="collection-item">
              <h7>Total Score : {{$totalScore}}</h7><br>
  	      @if($num_of_questions != 0)
	            <h7>Average Score : {{$totalScore/($no-1)}}</h7><br>
	      @else
		    <h7>Average Score : </h7><br>
	      @endif
            </div>
          </div>
        </div>
      </div><!--  /.row  -->

      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
@endsection

@section('after-scripts')
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
  </script>
@endsection
