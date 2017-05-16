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
        <h3 class="header center">Register</h3><br>
        <div class="row center">
            <div class="col s3 white-text">k</div>
            <form action="{{url('/reguser')}}" method="POST" class="col s6 center">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="last_name">Last Name</label>
                </div>
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
                </div>

        </div>
        <div class="row center">
          <button class="waves-effect waves-light red lighten-1 btn" type="submit" value="Submit">Submit</button>
        </div>
        </form>
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
