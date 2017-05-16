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
    {!! Form::open(array('url'=>'admin/post/add-questions','method'=>'POST', 'files'=>true)) !!}
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="id" value="{{$question_group->id}}">
    <?php $i=0;?>
    @while($i<$number)
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <label for="exampleInputFile">Question #{{$i + 1}}</label>
          <textarea type="text" class="form-control" name="question[{{$i}}]" rows="4" required></textarea>
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
          <select type="file" class="form-control" name="correct_answer[{{$i}}]">
            <option value="1">Option #A </option>
            <option value="2">Option #B </option>
            <option value="3">Option #C </option>
            <option value="4">Option #D </option>
            <option value="5">Option #E </option>
          </select>
        </div>
      </div>
    </div>
    <?php $arr = ['A','B','C','D','E']?>
    @for($j=1;$j<6;$j++)
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">Option #{{$arr[$j-1]}}</label>
          <textarea required type="text" class="form-control" name="option[{{$i*5+$j}}]" rows="2"></textarea>
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
