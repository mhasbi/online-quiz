@extends('layouts.master')
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
        <h5 class="header center">Edit for {{$questionGroup->name}}</h5><br>
        <div class="row center">
            <div class="col s3 white-text darken-1">k</div>
            <form action="{{url('admin/post/edit-question-group')}}" method="POST" class="col s6 center">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $questionGroup->id }}">
              <div class="row">
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="{{$questionGroup->name}}" id="name" name="name" type="text" class="validate">
                    <label for="name">Question Group Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" >{{$questionGroup->description}}</textarea>
                    <label for="description">Description</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="duration" name="duration" type="number" class="validate" value="{{$questionGroup->duration}}">
                    <label for="duration">Duration</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="numbers" name="numbers" type="number" class="validate" value="{{$number_of_question}}">
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
