@extends('layouts.before-login')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection
  @section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="card s3"></div>
      <div class="card s6 center">
        <br><br>
        <h3 class="header center">Login</h3><br>
        <div class="row center">
            <div class="col s3 white-text darken-1">k</div>
            <form action="{{url('/postlogin')}}" method="POST" class="col s6 center">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                  <div class="input-field col s12">
                    <input id="thisID" name="thisID" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                </div>
              </div>
              <div class="row center">
                <button class="waves-effect waves-light red lighten-1 btn" type="submit" value="Submit">Submit</button>
              </div>
              <br>
              <br>
        </div>
        </form>
        <button id="btn">Send an HTTP POST request to a page and get the result back</button>
        <br>
      </div><!--  /.row  -->
      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
@endsection
@section('after-scripts')
  <script>
  $(document).ready(function(){
    $("#btn").click(function(){
        $.ajax({
          url : "{{url('/get_data')}}",
          type: "POST",
          data: {
            name : $("#thisID").val(),
          },
          success: function(result){
            alert(result);
          }
        });
        alert($("#thisID").val());
    });
  });
  </script>
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  </script>
@endsection
