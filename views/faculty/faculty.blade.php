@extends('layouts.app')

@section('content')
    <script src="{{URL::asset('js/angular/faculty/list_faculty_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{URL::asset('js/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('js/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Main content -->
    <section class="model-content">
        <div class="container-fluid" ng-app="SMSApp" ng-controller="listFacultyController">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Faculty List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <label for="name"> Name:</label>
                                    <input class="form-control" type="text" ng-model="name_filter">
                                </div>
                                <div class="col-2">
                                    <label for="email"> Email:</label>
                                    <input class="form-control" type="text" ng-model="email_filter">
                                </div>
                            </div>
                        </div>
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
                                <tr ng-repeat="faculty in data | filter: {name: name_filter,email: email_filter}">
                                    <td><%faculty.id%></td>
                                    <td><%faculty.name%></td>
                                    <td><%faculty.email%></td>
                                    <td><%faculty.mobile%></td>
                                    <td><%faculty.dob | date%></td>
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