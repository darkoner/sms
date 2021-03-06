@extends('layouts.app')

@section('content')
    <script src="{{URL::asset('js/angular/course/course_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>
    <!-- Main content -->
    <section class="model-content">
        <div class="container-fluid" ng-app="SMSApp" ng-controller="courseController">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Course</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="c in data">
                                    <td><%c.id%></td>
                                    <td>
                                        <input type="text" class="form-control" ng-model="c.name">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger ml-3"
                                                ng-if="c.id > 0" ng-click="delete(c)">Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                            <button type="button" class="btn btn-sm btn-success text-white ml-4"
                                    ng-click="save()">Save
                            </button>
                            <button type="button" class="btn btn-sm btn-info ml-4"
                                    ng-click="add()">Add
                            </button>
                            <button type="button" class="btn btn-sm btn-danger ml-4"
                                    ng-click="remove()">Remove
                            </button>
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
@endsection