@extends('layouts.app')

@section('content')
    <script src="{{URL::asset('js/angular/attendance/list_student_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{URL::asset('js/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('js/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Main content -->
    <section class="model-content">
        <div class="container-fluid" ng-app="SMSApp" ng-controller="listAttendanceController">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Date of Birth</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="student in data">
                                    <td><%student.id%></td>
                                    <td><%student.name%></td>
                                    <td><%student.email%></td>
                                    <td><%student.mobile%></td>
                                    <td><%student.dob | date%></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- DataTables -->
    <script src="{{URL::asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- page script -->
@endsection