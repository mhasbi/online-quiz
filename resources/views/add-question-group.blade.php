@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection
  @section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="card s8 center">
        <br><br>
        <h5 class="header center">Add New Questions</h5><br>
        <div class="row center">
            <div class="col s3 white-text darken-1">k</div>
            <form action="{{url('admin/add-questions-list')}}" method="POST" class="col s6 center">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate">
                    <label for="name">Question Group Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="duration" name="duration" type="number" class="validate">
                    <label for="duration">Duration</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="numbers" name="numbers" type="number" class="validate">
                    <label for="numbers">Number of Question</label>
                  </div>

                </div>
              </div>
              <div class="row center">
                <button class="waves-effect waves-light red lighten-1 btn" type="submit" value="Submit">Next</button>
              </div>
              <br>
              <br>
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
