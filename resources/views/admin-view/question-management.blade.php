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
  <h3 class="box-title">Hover Data Table</h3>
</div>
<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Question Name</th>
        <th>Description</th>
        <th>Group</th>
        <th>Duration</th>
        <th>Status</th>
        <th>Activate</th>
        <th>Action</th>
      </tr>
    </thead>
      <tbody>
        @section('title-page')
          <b>Question Management</b>
        @endsection
        <?php $no = 1;?>
        @section('notification')
          @if(isset($notification))
          <div class="callout callout-success">
          <h4>{{$notification['condition']}}</h4>

          <p>{{$notification['message']}}</p>
          </div>
          @endif
        @endsection
        @foreach($questionList as $question)
        <tr>
          <td>{{$no++."."}}</td>
          <td>{{$question->name}}</td>
          <td>{{$question->description}}</td>
          <td>{{$question->q_group}}</td>
          <td>{{$question->duration}}</td>
          @if($question->status == 1)
            <td>Active</td>
          @else
            <td>Not Active</td>
          @endif
          @if($question->status == 0)
            <td><a href="{{url('admin/question-management/change-activasion/1/'.$question->id)}}" class="btn btn-block btn-success btn-xs">Activate</a></td>
          @else
            <td><a href="{{url('admin/question-management/change-activasion/1/'.$question->id)}}" class="btn btn-block btn-danger btn-xs">Deactivate</a></td>
          @endif
          <td><a href="{{url('admin/question-management/detail/'.$question->id)}}" class="btn btn-block btn-info btn-xs">Detail</a>
          <a href="{{url('admin/question-management/delete/'.$question->id)}}" class="btn btn-block btn-danger btn-xs">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </thead>
  </table>
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
