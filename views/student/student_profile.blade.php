@extends('layouts.app')

@section('content')

    <meta name="_token" content="{{ csrf_token() }}">
    <script src="{{ URL::asset('js/angular/student/student_profile_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>

    <div id="profile" class="page-layout simple tabbed" ng-app="SMSApp" ng-controller="studentProfileController">

        <div class="bg-white text-auto p-5 row no-gutters align-items-center justify-content-between">
            <div class="col-md-6">
                <h1 class="doc-title h4" id="content">My Profile :
                    <span class="text-blue"> <%profile.name%></span>
                </h1>
            </div>
        </div>

        <div class="page-content">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link btn active" id="about-tab" data-toggle="tab"
                       href="#about-tab-pane" role="tab" aria-controls="about-tab-pane">About
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="row ml-2" ng-if="errors.length > 0">
                    <ul class="alert alert-danger ul-error" id="errors">
                        <li ng-repeat="error in errors">
                            <% error %>
                        </li>
                    </ul>
                </div>

                {{-- About Tab --}}
                <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab">
                    <div class="row">
                        <div class="about col-sm-12 col-xs-12 col-md-12 col-xl-2">
                            <div class="profile-box friends card mb-4 ">

                                <div class="col text-center mb-5 mt-5 small-profile-text">
                                    <span class="h6">Profile Photo</span>
                                </div>
                                <div class="content row no-gutters p-4">
                                    <div class="friend col-12 p-1 text-center">
                                        <img ng-if="!profile.profile_pic" class="w-50 img-circle small-profile-pic"
                                             src="img/profile.jpg">
                                        <img ng-if="profile.profile_pic" class="w-50 img-circle small-profile-pic"
                                             ng-src="<%profile.profile_pic%>">

                                        @if(Auth::user()->is_admin == 1)
                                        <label class="text-center " for="profile_update">
                                            <i class="icon icon-border-color update_button_square"></i>
                                            <input type="file" id="profile_update" hidden
                                                   ng-files="setTheFiles($files); uploadPic()">
                                        </label>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="about col-sm-12 col-xs-12 col-md-12 col-xl-7">
                            <div class="profile-box info-box general card mb-4">
                                <div class="content p-4">
                                    <div class="row">
                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Name
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" class="form-control form-control-line"
                                                   ng-model="profile.name"/>
                                        </div>

                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Date of Birth</div>
                                            <input type="text"
                                                   class="form-control form-control-line date-picker-no-future-dates"
                                                   ng-model="profile.dob"/>
                                        </div>
                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Permanent ID</div>
                                            <input type="text"
                                                   class="form-control form-control-line"
                                                   ng-model="profile.p_no"/>
                                        </div>

                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Gender</div>
                                            <input type="text"
                                                   class="form-control form-control-line"
                                                   ng-model="profile.gender"/>
                                        </div>
                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Email
                                            </div>
                                            <input type="text" class="form-control form-control-line"
                                                   ng-model="profile.email"/>
                                        </div>

                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-4">
                                            <div class="title mb-1">Mobile Number</div>
                                            <input type="text" class="form-control form-control-line"
                                                   ng-model="profile.mobile" numeric-only/>
                                        </div>
                                        <div class="info-line mb-6 col-sm-12 col-md-4 col-xl-12">
                                            <div class="title mb-1">Address</div>
                                            <textarea class="form-control mb-1" ng-model="profile.address" row="8"></textarea>
                                        </div>
                                        <button type="button" class="btn  btn-info ml-4" ng-click="Save()"
                                                ng-if="auth.user.is_admin == 1">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
