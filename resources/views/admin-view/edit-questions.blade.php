@extends('layouts.master-admin')
@section('username-top')
@endsection
@section('username-top-extend')
@endsection
@section('username-sidebar')
@endsection
@section('notifiction')
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Detail and Edit Questions of {{" ".$question_group->name}}</h3>
  </div>
  <div class="box-body">
    {!! Form::open(array('url'=>'admin/post/edit-questions','method'=>'POST', 'files'=>true)) !!}
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="id" value="{{$question_group->id}}">
    <?php $i=0;?>
    @while($i<$number)
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <label for="exampleInputFile">Question #{{$i + 1}}</label>
          @if(isset($questions[$i]))
          <input name="q_id[{{$i}}]" type="hidden" value="{{$questions[$i]->id}}"/>
          <textarea type="text" class="form-control" name="question[{{$i}}]" rows="4">{{$questions[$i]->question}}</textarea>
          @else
          <textarea type="text" class="form-control" name="question[{{$i}}]" rows="4"></textarea>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">File Image</label>
          <input type="file" class="form-control" name="q_image[{{$i}}]"></input>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">Correct Answer</label>
          @if(isset($questions[$i]))
          <select type="file" class="form-control" name="correct_answer[{{$i}}]">
            @if($questions[$i]->correct_answer == 1)
              <option value="1" selected>Option #A </option>
            @else
              <option value="1" >Option #A </option>
            @endif
            @if($questions[$i]->correct_answer == 2)
              <option value="2" selected>Option #B </option>
            @else
              <option value="2" >Option #B </option>
            @endif
            @if($questions[$i]->correct_answer == 3)
              <option value="3" selected>Option #C </option>
            @else
              <option value="3" >Option #C </option>
            @endif
            @if($questions[$i]->correct_answer == 4)
              <option value="4" selected>Option #D </option>
            @else
              <option value="4" >Option #D </option>
            @endif
            @if($questions[$i]->correct_answer == 5)
              <option value="5" selected>Option #E </option>
            @else
              <option value="5" >Option #E </option>
            @endif
          </select>
          @else
          <select type="file" class="form-control" name="correct_answer[{{$i}}]">
              <option value="1" >Option #A </option>
              <option value="2" >Option #B </option>
              <option value="3" >Option #C </option>
              <option value="4" >Option #D </option>
              <option value="5" >Option #E </option>
          </select>
          @endif
        </div>
      </div>
    </div>
    <?php $arr = ['A','B','C','D','E'];$j=1;?>
    @if(isset($questions[$i]))
      <?php $quests = $options->where('id_question',$questions[$i]->id); ?>
      @if(count($quests) >= 4)
        @foreach($quests as $quest)
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputFile">Option #{{$arr[$j-1]}}</label>
                <input name="opt_id[{{$i*5+$j}}]" value="{{$quest->id}}" type="hidden"/>
                <textarea type="text" class="form-control" name="option[{{$i*5+$j}}]" rows="2">{{$quest->statement}}</textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputFile">File Image</label>
                <input type="file" class="form-control" name="opt_image[{{$i*5+$j}}]"></input>
              </div>
            </div>
          </div>
          <?php $j++;?>
        @endforeach
      @else
        @for($j=1;$j<6;$j++)
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputFile">Option #{{$arr[$j-1]}}</label>
              <textarea type="text" class="form-control" name="option[{{$i*5+$j}}]" rows="2"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputFile">File Image</label>
              <input type="file" class="form-control" name="opt_image[{{$i*5+$j}}]"></input>
            </div>
          </div>
        </div>
        @endfor
      @endif
    @else
    @for($j=1;$j<6;$j++)
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">Option #{{$arr[$j-1]}}</label>
          <textarea type="text" class="form-control" name="option[{{$i*5+$j}}]" rows="2"></textarea>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">File Image</label>
          <input type="file" class="form-control" name="opt_image[{{$i*5+$j}}]"></input>
        </div>
      </div>
    </div>
    @endfor
    @endif
    <div class="box-footer clearfix">

    </div>
    <?php $i++; ?>
    @endwhile

    <button class="btn btn-success btn-lg" type="submit">Submit</button>
  </form>
  </div>
</div>
@endsection
@section('after-script')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
