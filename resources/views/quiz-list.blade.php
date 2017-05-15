@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection

@section('content')
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h2 class="header red-text text-lighten-1">Daftar Quiz</h2>
        </div>
      </div><!--  /.row  -->

      <div class="row">
        @foreach($questionsList as $question)
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">{{$question->name}}</span>
            </div>
            <div class="card-content">
              <p>{{$question->description}}</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions-list/'.$question->id)}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col -->
        @endforeach
      </div><!--  /.row  -->
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
@endsection

@section('after-scripts')
  <script>

  </script>
@endsection
