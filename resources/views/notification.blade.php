@extends('layouts.before-login')
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
        <h1 class="header center">{{$message}}</h1>
        <div class="row center">
          <h5 class="header col s12">{{$condition}}</h5>
        </div>
        @if($link)
        <div class="row center">
          <h7 class="header col s12 "><a href="{{$link}}" class="btn">Click here to redirect</a></h7>
        </div>
        @elseif(!Auth::check())
        <div class="row center">
          <h7 class="header col s12 "><a href="{{url('login')}}" class="btn">Click here to login</a></h7>
        </div>
        @endif
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
