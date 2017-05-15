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
        <h1 class="header center">Online Quiz</h1>
        <div class="row center">
          <h5 class="header col s12">Selamat datang di Online Quiz! Tempat berbagi bersama lalala</h5>
        </div>
        <div class="row center">
          <a href="{{url('/login')}}" class="waves-effect waves-light grey darken-1 btn-large ">Login Here</i></a>
        </div>

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
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  </script>
@endsection
