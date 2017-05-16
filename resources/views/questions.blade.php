@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection

@section('content')
  <script>
    var duration = 0;
  </script>
  <a class="waves-effect waves-light red lighten-1 btn" id="demo" style="left:0;position:fixed"></a>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <br><br>

        <h1 class="header center">Quiz IPA</h1>
        <div class="row center">
          <h5 class="header col s12">Pilihlah jawaban yang tepat dari pertanyaan berikut ini</h5>
        </div>
        <br>
      </div><!--  /.row  -->
      <?php $i = 0; $j = 0;?>
      <form action="{{url('post/answer')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @foreach($questions as $question)
        <div class="collection with-header">

          <input type="hidden" name="q_category" value="{{ $question->id_category }}">
          <input type="hidden" name="quizTakenID" value="{{ $quiz_taken_id }}">
          <input type="hidden" name="questionsIDList[{{$i}}]" value="{{$question->id}}">
          <div class="collection-header">
            @if($question->file_image)
              <img src="{{url($question->file_image)}}"><br>
            @endif
            <h5>{{($i+1). ". ". $question->question}}</h5></div>
          <div class="collection-item">
             <?php
                  $thisOptions = $options->where('id_question', $question->id);
                  $k = 0;
              ?>
             @foreach($thisOptions as $thisOption)
             <?php $k++; ?>
             <p>

               <input name="answersList[{{$i}}]" type="radio" id="test{{$j}}" value="{{$k}}" />

               <label for="test{{$j}}">{{$thisOption->statement}}
               @if($thisOption->file_image)<br>
                <img src="{{url($thisOption->file_image)}}"><br>
               @endif
               </label>
             </p>
             <?php $j++; ?>
             @endforeach
          </div>
        </div>
        <?php $i++; ?>
        @endforeach
        <div class="col s10 offset-s1 center-align">
          <button class="waves-effect waves-light red lighten-1 btn" type="submit" value="Submit">Submit</button>
        </div>
      </form>
      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
@endsection

@section('after-scripts')
  <script>
  // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();
  var now = new Date("Jan 5, 2018 15:37:25").getTime();
  var duration = {{$duration}} * 1000 * 60;
  var result;
  // Update the count down every 1 second
  var x = setInterval(function() {
      // Get todays date and time
      var now = new Date().getTime();
      duration = duration - 1000;
      // Find the distance between now an the count down date
      var distance = duration;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is over, write some text
      if (distance < 0){
          hello();
          clearInterval();

      }
  }, 1000);
  function hello(){
    var itr = {{$i}};
    var answersList = [];
    var questionsIDList= [];
    for (i = 0; i < itr; i++) {
        answersList[i] = $("input:radio[name='answersList["+i+"]']:checked").val();
        questionsIDList[i] = $("input[name='questionsIDList["+i+"]']").val();
    }
    $.redirect("{{url('/post/answer')}}", {
        'answersList': answersList,
        'questionsIDList' : questionsIDList,
        '_token' : $("input[name='_token']").val(),
        'q_category' : $("input[name='q_category']").val(),
        'quizTakenID' : $("input[name='quizTakenID']").val()
      });
  }
  </script>
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  </script>
@endsection
