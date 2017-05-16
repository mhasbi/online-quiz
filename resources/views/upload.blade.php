@extends('layouts.master')
@section('content')
<div class="container">
   <div class="card s8 center">
     <div class="span7 offset1"><br><br>
       <h5 class="header center">Add New Questions</h5><br>
        {!! Form::open(array('url'=>'admin/post/create-question-group','method'=>'POST', 'files'=>true)) !!}
         <div class="row center">
            <div class="col s2 white-text darken-1">k</div>
            <div class="row">
              <div class="row">
                <div class="file-field input-field col s8">
                  <input id="input_text" type="text" data-length="10">
                  <label for="input_text">Input text</label>
                </div>
              </div>
              <div class="row">
                <div class="file-field input-field col s8">

                  <div class="btn">
                    <span>Image</span>
                    <input name='image' type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>


          </div>
          </div>
        <div id="success"> </div>
      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
      {!! Form::close() !!}
      </div>
   </div>
</div>
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
  $(document).ready(function() {
  $('select').material_select();
});
</script>
@endsection
