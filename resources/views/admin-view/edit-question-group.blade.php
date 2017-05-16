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
    <h3 class="box-title">Detail and Edit Question Group</h3>
  </div>
  <div class="box-body">
    <form action="{{url('admin/post/edit-group-question')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="id" value="{{$question->id}}">
    <div class="form-group">
      <label for="exampleInputEmail1">Question Group Name</label>
      <input type="text" name="name" value="{{$question->name}}" class="form-control" id="exampleInputEmail1" placeholder="Question Name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea class="form-control" row="5" name="description">{{$question->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Group</label>
      <select class="form-control" name="group">
        @if($question->group == "IPA")
          <option value="IPA" selected>IPA</option>
        @else
          <option value="IPA" >IPA</option>
        @endif
        @if($question->group == "IPS")
          <option value="IPS" selected>IPS</option>
        @else
          <option value="IPS">IPS</option>
        @endif
        @if($question->group == "IPC")
          <option value="IPC" selected>IPC</option>
        @else
          <option value="IPC">IPC</option>
        @endif
      </select>
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class="form-group">
          <label for="exampleInputFile">Duration</label>
          <input type="number" value="{{$question->duration}}"class="form-control" name="duration">
        </div>
      </div>
      <div class="col-lg-1"><br>
        <label for="exampleInputFile">Minutes</label>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputFile">Number</label>
          <input type="number" value="{{$number}}"class="form-control" name="number">
        </div>
      </div>
    </div>
    <button class="btn btn-success btn-lg" type="submit">Next</button>
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
