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
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
      <tbody>
        @section('title-page')
          <b>User Management</b>
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
        @foreach($users as $user)
        <tr>
          <td>{{$no++."."}}</td>
          <td>{{$user->first_name." ".$user->last_name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->email}}</td>
          @if($user->role == 0)
            <td>Student</td>
          @else
            <td>Admin</td>
          @endif
          @if($user->role == 0)
            <td><a href="{{url('admin/user-management/change-role/1/'.$user->id)}}" class="btn btn-block btn-success btn-xs">Promote</a></td>
          @else
            <td><a href="{{url('admin/user-management/change-role/0/'.$user->id)}}" class="btn btn-block btn-danger btn-xs">Demote</a></td>
          @endif
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
