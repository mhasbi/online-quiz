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
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">Matematika</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col -->
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">IPA</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col --><div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">IPS</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col -->
      </div><!--  /.row  -->
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">Matematika</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col -->
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">IPA</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col --><div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img  class="responsive-img" src="http://placehold.it/1000x400">
              <span class="card-title">IPS</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="{{url('questions')}}" class="waves-effect waves-light red lighten-2 white-text btn">Take Quiz</a>
            </div>
          </div>
        </div><!-- /col -->
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
