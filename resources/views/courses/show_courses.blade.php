@extends('layouts.master')
@section('content')
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Courses</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Course Duration</th>
                                            <th>Course Details</th>
                                            <th>Course Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{$course->course_name}}</td>
                                            <td>{{$course->course_duration}}</td>
                                            <td>{{$course->course_detail}}</td>
                                            <td>{{$course->course_amount}}</td>
                                            <td>
                                                <a href="/courses/{{$course->id}}/edit">
                                                     <input type="submit" class="btn btn-info btn-sm" value="Edit"/>
                                                 </a>&nbsp;&nbsp;&nbsp;
                                                <form action="/courses/{{$course->id}}" method="POST" class="d-inline" >
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure?')" value="Delete"/>
                                                </form>
                                            </td>
                                        </tr>
                                     @endforeach   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <script src="{!!asset('assets/js/lib/data-table/datatables.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/dataTables.buttons.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.bootstrap.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/jszip.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/vfs_fonts.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.html5.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.print.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.colVis.min.js')!!}"></script>
    <script src="{!!asset('assets/js/init/datatables-init.js')!!}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
@endsection
