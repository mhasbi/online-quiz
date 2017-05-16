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

        <h5 class="header center">Make Questions for {{$question_category->name}}</h5>
        <div class="row center">
        </div>
        <br>
      </div><!--  /.row  -->
      <?php $i = 0; $j = 0;?>
      <div class="secure">Upload form</div>
      {!! Form::open(array('url'=>'admin/post/create-question-group','method'=>'POST', 'files'=>true)) !!}
       <div class="control-group">
        <div class="controls">
        {!! Form::file('image') !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="id_category" value="{{ $question_category->id }}">
        <?php $k =1; ?>
        @for($i=0;$i<$numbers;$i++)
        <div class="collection with-header">
          <div class="collection-header">
            <div class="input-field col s6">
              <textarea id="description" name="description[{{$i}}]" class="materialize-textarea"></textarea>
              <label for="description[{{$i}}]">Question</label>
              <input name="img_q" type="file">
            </div>
            <div class="file-field input-field col s6">
            {!! Form::file('image') !!}

            </div>
          </div>
          <div class="collection-item">
            <div class="input-field col s12">
              <select name="corrected[{{$i}}]" style="z-index:30">
                <option value="0"disabled selected>Choose correct answer</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
                <option value="4">Option 5</option>
              </select>
            </div>
             @for($j=1;$j<6;$j++)
                <div class="input-field col s6">
                   <input id="options[{{$k}}]" name="options[{{$k}}]" type="text" class="validate">
                   <label for="options[{{$k}}]">Option {{$j}}</label>
                </div>
                <div class="file-field input-field col6">
                    <div class="btn">
                      <span>File</span>
                      <input name="img_opt[{{$k}}]" type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                </div>
             <?php $k++; ?>
             @endfor

          </div>
        </div>
        @endfor
        <div class="col s10 offset-s1 center-align">
          <button class="waves-effect waves-light red lighten-1 btn" type="submit" value="Submit">Submit</button>
        </div>
      </form>
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
    $(document).ready(function() {
    $('select').material_select();
});
  </script>
@endsection
