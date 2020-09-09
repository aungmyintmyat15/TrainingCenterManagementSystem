@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="col-lg-8 ml-5 col-sm-5">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Trainer</strong><a href="/trainers" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-bold"></i>&nbsp;All Trainer</a>
                </div>
                <div class="card-body card-block">
                    @if(session('status'))
                        <p class="alert alert-success"><small>{{session('status')}}</small></p>
                    @endif
                        <form action="/trainers/{{$trainer->id}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="course_id" name="course_id">
                                    <option value="" disabled selected>Choose your course</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}"
                                        @if($course->id==$trainer->course_id)
                                        selected="selected"
                                        @endif
                                        >{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="has-success form-group">                                                      
                                <label for="batch_id" class=" form-control-label">Batch Name</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="batch_id" name="batch_id">
                                    <option value="" disabled selected>Choose your batch</option>
                                    @foreach($batches as $batch)
                                        <option value="{{$batch->id}}"
                                        @if($batch->id==$trainer->batch_id)
                                        selected="selected"
                                        @endif
                                        >{{$batch->batch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_name" class=" form-control-label">Teacher Name</label>
                                <input type="text" id="teacher_name" name="teacher_name" class="is-valid form-control" placeholder="Enter teacher name" value="{{$trainer->teacher_name}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_phone" class=" form-control-label">Teacher Phone</label>
                                <input type="text" id="teacher_phone" name="teacher_phone" class="is-valid form-control" placeholder="Enter teacher phone" value="{{$trainer->teacher_phone}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_photo" class=" form-control-label">Teacher Photo</label>
                                <input type="file" id="teacher_photo" name="teacher_photo" class="is-valid form-control" placeholder="Enter teacher photo" value="{{$trainer->teacher_photo}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_address" class=" form-control-label">Teacher Address</label>
                                <input type="text" id="teacher_address" name="teacher_address" class="is-valid form-control" placeholder="Enter teacher address" value="{{$trainer->teacher_address}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_email" class="form-control-label">Teacher Email</label>
                                <input type="text" id="teacher_email" name="teacher_email" class="is-valid form-control" placeholder="Enter teacher email" value="{{$trainer->teacher_email}}">
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