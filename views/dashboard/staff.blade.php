@extends('layouts.app')

@section('content')

    <script src="{{ URL::asset('js/angular/home_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>
    <div class="doc popovers-doc page-layout simple full-width">
        <div class="bg-white text-auto p-5 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Staff Dashboard</h1>
        </div>
        <h5 class="pl-5 mt-5">EASY ACCESS</h5>
        <div class="row p-shortcut-row">
            <div class="col-lg-3 col-md-6 pb-2">
                <div class="card bg-bluegray">
                    <a class="link-primary" href="{{URL('/faculty_profile?user_id='.Auth::id())}}">
                        <div class="card-body">
                            <h5 class="mt-2 text-white">
                                <i class="icon icon-account-edit text-white pr-2"></i>
                                My Profile
                            </h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 pb-2">
                <div class="card bg-bluegray">
                    <a class="link-primary" href="{{URL('/faculty_list')}}">
                        <div class="card-body">
                            <h5 class="mt-2 text-white">
                                <i class="icon icon-calendar-check text-white pr-2"></i>
                                Faculty
                            </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-2">
                <div class="card bg-bluegray">
                    <a class="link-primary" href="{{URL('/student_list')}}">
                        <div class="card-body">
                            <h5 class="mt-2 text-white">
                                <i class="icon icon-grease-pencil text-white pr-2"></i>
                                Student
                            </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-2">
                <div class="card bg-bluegray">
                    <a class="link-primary" href="{{URL('/settings')}}">
                        <div class="card-body">
                            <h5 class="mt-2 text-white">
                                <i class="icon icon-settings text-white pr-2"></i>
                                Settings
                            </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <h5 class="pl-5 mt-5">STATS</h5>
        <div ng-app="ProgressiveMaterialApp" ng-controller="homeController">
            <div class="row p-shortcut-row">
                <div class="col-lg-3 col-md-6 pb-2">
                    <a class="link-primary" ng-click="">
                        <div class="widget widget1 card">
                            <div class="widget-content pt-4 pb-4 d-flex flex-column align-items-center justify-content-center">
                                <div class="stat-title text-danger"><%total_project%></div>
                                <div class="sub-title h6 text-muted">TOTAL ASSIGNED PROJECT</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 pb-2">
                    <a class="link-primary">
                        <div class="widget widget1 card">
                            <div class="widget-content pt-4 pb-4 d-flex flex-column align-items-center justify-content-center">
                                <div class="stat-title text-warning"><%total_client%></div>
                                <div class="sub-title h6 text-muted">TOTAL CLIENT</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row p-shortcut-row">
                <div class="col-lg-6 col-md-6">
                    <h5>New Clients</h5>
                    <div class="page-content-card bg-white card height-card">
                        <div class="page-content custom-scrollbar">
                            <table class="table table-striped" ng-if="new_client.length > 0">
                                <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="nc in new_client">
                                    <td>
                                        <a class="typical-link" href="client_profile?user_id=<%nc.user_id%>"
                                           ng-click="$event.preventDefault(); openClientProfile(nc)">
                                            <%nc.name%>
                                        </a>
                                    </td>
                                    <td><%nc.email%></td>
                                    <td><span class="badge badge-danger">Not approved</span></td>
                                    <td>
                                        <a class="hover mr-1 btn btn-success"
                                           ng-click="openActivateDeactivateApproveRequestClientModal(nc)"
                                           data-toggle="modal" data-target="#approveClientRegistrationRequest"
                                           title="Approve">
                                            <i class="icon icon-account-plus text-success"></i> Approve
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="container mt-70px" ng-if="new_client.length <= 0">
                                <center>
                                    <img src="{{asset('img/happy.png')}}">
                                    <h4>All clients accounts are approved</h4>
                                    <button class="btn btn-sm" ng-click="viewAllClients()">View All Clients</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <h5>New Specification</h5>
                    <div class="page-content-card bg-white card height-card">
                        <div class="page-content custom-scrollbar">
                            <table class="table table-striped" ng-if="quote.length > 0">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Project</th>
                                    <th>Manufacturer</th>
                                    <th>Product</th>
                                    <th>Summary</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="q in quote | unique: 'id'">
                                    <td><%q.client_company%></td>
                                    <td><%q.project_name%></td>
                                    <td><%q.business_name%></td>
                                    <td><%q.product%></td>
                                    <td>
                                        <a class="typical-link" ng-click="openQuoteSummaryPDF(q)">
                                            <%q.quote_pdf_name%>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="hover mr-1 btn btn-primary text-white"
                                           ng-click="quoteReview(q.id)">Reviewed
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="container mt-70px" ng-if="quote.length <= 0">
                                <center>
                                    <img src="{{asset('img/happy.png')}}">
                                    <h4>All Specifications are reviewed</h4>
                                    <button class="btn btn-sm" ng-click="viewAllSpecifications()">View All Specifications</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('partials.modal.approve_client_registration_request_modal')
        </div>
    </div>
@endsection
