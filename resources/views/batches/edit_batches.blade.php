@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Edit Batch</strong><a href="/batches" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-bold"></i>&nbsp;All Batch</a>
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                                <form action="/batches/{{$batch->id}}" method="post">
                                @method('PUT')
                                @csrf
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="course_id" name="course_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}"
                                    @if($course->id==$batch->course_id)
                                      selected="selected"
                                      @endif
                                    >{{$course->course_name}}</option>
                                @endforeach
                                </select>
                           </div>
                         
                            <div class="has-success form-group">
                                <label for="batch_name" class=" form-control-label">Batch No</label>
                                <input type="text" id="batch_name" name="batch_name" class="is-valid form-control" placeholder="Enter batch number" value="{{$batch->batch_name}}">
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="batch_year" class=" form-control-label">Batch Year</label>
                                <input type="text" id="batch_year" name="batch_year" class="is-valid form-control" placeholder="Enter batch year" value="{{$batch->batch_year}}">
                            </div>
                    
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
@endsection