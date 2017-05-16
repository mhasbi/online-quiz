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
        <h3 class="header center">Question Management</h3>
          <div class="collection with-header">

            <div class="collection-item">
            <table class="bordered striped red lighten-1" id="table_id">

              <thead>
                <tr class="white-text">
                    <th>No.</th>
                    <th>Category Name</th>
                    <th>Duration</th>
                    <th>Number of Questions</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
              </thead>
              <a href="{{url('admin/add-question-group')}}" class="waves-effect waves-light btn">Add New Questions</a>
              <tbody>
                    <?php $number = 1; ?>
                  @foreach($question_categories as $question_category)
                  <tr>
                    <td>{{$number++}}</td>
                    <td>{{$question_category->name}}</td>
                    <td>{{$question_category->duration. " minutes"}}</td>
                    <?php
                        $thisQuestions = $questions->where('id_category', $question_category->id);
                    ?>
                    <td>{{count($thisQuestions)}}</td>
                    <td>{{$question_category->created_at}}</td>
                    <td><a href="{{url('admin/questions-management/detail/'.$question_category->id)}}" class="waves-effect waves-light btn">Detail/Edit</a></td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div><!--  /.row  -->

      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
@endsection

@section('after-scripts')
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
  </script>
@endsection
