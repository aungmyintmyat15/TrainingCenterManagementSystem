@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Student Register</strong>
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="{{'/students'}}" enctype="multipart/form-data" method="post">
                                @csrf
                         
                            <div class="has-success form-group">
                                <label for="student_name" class=" form-control-label">Student Name</label>
                                <input type="text" id="student_name" name="student_name" class="is-valid form-control" placeholder="Enter a student name">
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="father_name" class=" form-control-label">Father Name</label>
                                <input type="text" id="father_name" name="father_name" class="is-valid form-control" placeholder="Enter a father's name">
                            </div>
                            <div class="has-success form-group">
                                <label for="mother_name" class=" form-control-label">Mother Name</label>
                                <input type="text" id="mother_name" name="mother_name" class="is-valid form-control" placeholder="Enter a mother's name">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_photo" class=" form-control-label">Photo</label>
                                <input type="file" id="student_photo" name="student_photo" class="is-valid form-control" placeholder="Choose your photo">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_phone" class=" form-control-label">Phone No</label>
                                <input type="text" id="student_phone" name="student_phone" class="is-valid form-control" placeholder="Enter a phone number">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_address" class=" form-control-label">Address</label>
                                <input type="text" id="student_address" name="student_address" class="is-valid form-control" placeholder="Enter a address">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_email" class=" form-control-label">Email</label>
                                <input type="text" id="student_email" name="student_email" class="is-valid form-control" placeholder="Enter a email">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_gender" class=" form-control-label">Gender</label><br>
                                <input type="radio" id="student_gender" name="student_gender" value="Male">&nbsp;Male&nbsp;&nbsp;
                                <input type="radio" id="student_gender" name="student_gender" value="Female">&nbsp;Female
                            </div>
                            <div class="has-success form-group">
                                <label for="student_date_of_birth" class=" form-control-label">Birthday</label>
                                <input type="date" id="student_date_of_birth" name="student_date_of_birth" class="is-valid form-control">
                            </div>
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="course_id" name="course_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                                </select>
                           </div>
                           <div class="has-success form-group">                                                      
                                <label for="batch_id" class=" form-control-label">Batch No</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="batch_id" name="batch_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($batches as $bat)
                                    <option value="{{$bat->id}}">{{$bat->batch_name}}</option>
                                @endforeach
                                </select>
                           </div>
                    
                            <button type="submit" class="btn btn-outline-primary">Register</button>
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