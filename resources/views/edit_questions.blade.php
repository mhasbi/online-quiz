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

        <h5 class="header center">Edit Questions of {{$question_category->name}}</h5>
        <div class="row center">
        </div>
        <br>
      </div><!--  /.row  -->
      <?php $i = 0; $j = 0;?>
      <form action="{{url('admin/post/edit-questions')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id_category" value="{{ $question_category->id }}">      
        <?php $k =1; ?>
        @for($i=0;$i<$numbers;$i++)
        @if(!isset($questions[$i]))
        <div class="collection with-header">
          <div class="collection-header">
            <div class="input-field col s12">
              <textarea id="description" name="description[{{$i}}]" class="materialize-textarea"></textarea>
              <label for="description[{{$i}}]">Question</label>
            </div>
          </div>
          <div class="collection-item">
            <div class="input-field col s12">
              <select name="corrected[{{$i}}]" style="z-index:30">
                <option value="0"disabled selected>Choose correct answer</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 3</option>
              </select>
            </div>
             @for($j=1;$j<5;$j++)
                <div class="input-field col s12">
                   <input id="options[{{$k}}]" name="options[{{$k}}]" type="text" class="validate">
                   <label for="options[{{$k}}]">Option {{$j}}</label>
                </div>
             <?php $k++; ?>
             @endfor

          </div>
        </div>
        @else
        <div class="collection with-header">
          <div class="collection-header">
            <input type="hidden" name="id_question[$i]" value="{{ $questions[$i]->id }}">
            <div class="input-field col s12">
              <textarea id="description" name="description[{{$i}}]" class="materialize-textarea"></textarea>
              <label for="description[{{$i}}]">{{$questions[$i]->question}}</label>
            </div>
          </div>
          <div class="collection-item">
            <div class="input-field col s12">
              <select name="corrected[{{$i}}]" style="z-index:30">
                <?php $option = $options->where('id_question',$questions[$i]->id); ?>
                <?php $itr_opt = 0;?>
                @foreach($option as $opt)
                  <option value="{{$itr_opt++}}"
                    @if($questions[$i]->correct_answer == $itr_opt)
                      {{" selected"}}
                    @endif
                  >Option {{$itr_opt}}</option>
                @endforeach
                <?php $itr_opt = 0;?>
              </select>
            </div>
             @foreach($option as $opt)
                <div class="input-field col s12">
                   <input id="options[{{$k}}]" name="option_id[{{$k}}]" type="text" class="validate" value="{{$opt->id}}" hidden>
                   <input id="options[{{$k}}]" name="options[{{$k}}]" type="text" class="validate" value="{{$opt->statement}}">
                </div>
             <?php $k++; ?>
             @endforeach

          </div>
        </div>
        @endif
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
