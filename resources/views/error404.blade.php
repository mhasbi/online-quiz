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
        <h1 class="header center">Error 404</h1>
        <div class="row center">
          <h5 class="header col s12">Sorry, the page you are looking for is not found</h5>
        </div>
        <div class="row center">
          <h7 class="header col s12 "><a href="{{url('/')}}" class="btn">Back to home</a></h7>
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
