@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection

@section('content')
  <a class="waves-effect waves-light red lighten-1 btn" id="demo" style="left:0;position:fixed"></a>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <br><br>
        <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
        </script>
        <h1 class="header center">Quiz IPA</h1>
        <div class="row center">
          <h5 class="header col s12">Pilihlah jawaban yang tepat dari pertanyaan berikut ini</h5>
        </div>
        <br>
      </div><!--  /.row  -->
      <div class="collection with-header">
        <div class="collection-header"><h5>1. Termasuk kelas apakah hewan Gallus gallus?</h5></div>
        <div class="collection-item">
          <form action="#">
           <p>
             <input name="group1" type="radio" id="test1" />
             <label for="test1">A. Mamalia</label>
           </p>
           <p>
             <input name="group1" type="radio" id="test2" />
             <label for="test2">B. Mollusca</label>
           </p>
           <p>
             <input class="with-gap" name="group1" type="radio" id="test3"  />
             <label for="test3">C. Aves</label>
           </p>
           <p>
             <input class="with-gap" name="group1" type="radio" id="test4"  />
             <label for="test4">D. Arthropoda</label>
           </p>
         </form>
        </div>
      </div>
      <div class="collection with-header">
        <div class="collection-header"><h5>2. Termasuk kelas apakah hewan Rhinoceros Sundaicus?</h5></div>
        <div class="collection-item">
          <form action="#">
           <p>
             <input name="group3" type="radio" id="test9" />
             <label for="test9">A. Mamalia</label>
           </p>
           <p>
             <input name="group3" type="radio" id="test10" />
             <label for="test10">B. Mollusca</label>
           </p>
           <p>
             <input class="with-gap" name="group3" type="radio" id="test11"  />
             <label for="test11">C. Aves</label>
           </p>
           <p>
             <input class="with-gap" name="group3" type="radio" id="test12"  />
             <label for="test12">D. Arthropoda</label>
           </p>
         </form>
        </div>
        <div class="collection with-header">
          <div class="collection-header"><h5>3. Termasuk kelas apakah hewan Panthera Tigris?</h5></div>
          <div class="collection-item">
            <form action="#">
             <p>
               <input class="with-gap" name="group2" type="radio" id="test5" />
               <label for="test5">A. Mamalia</label>
             </p>
             <p>
               <input class="with-gap" name="group2" type="radio" id="test6" />
               <label for="test6">B. Mollusca</label>
             </p>
             <p>
               <input class="with-gap" name="group2" type="radio" id="test7"  />
               <label for="test7">C. Aves</label>
             </p>
             <p>
               <input class="with-gap" name="group2" type="radio" id="test8"  />
               <label for="test8">D. Arthropoda</label>
             </p>
           </form>
          </div>
      </div>

      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
@endsection

@section('after-scripts')
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  </script>
@endsection
