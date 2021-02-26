@extends('layouts.app')

@section('content')

    <script src="{{ URL::asset('js/angular/home_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>
    <div class="doc popovers-doc page-layout simple full-width">
        <div class="bg-white text-auto p-5 row no-gutters align-items-center justify-content-between">
            @if(Auth::user()->is_admin == 1)
            <h1 class="doc-title h4" id="content">Admin Dashboard</h1>
            @elseif(Auth::user()->is_student == 1)
            <h1 class="doc-title h4" id="content">Student Dashboard</h1>
            @else
                <h1 class="doc-title h4" id="content">Faculty Dashboard</h1>
            @endif
        </div>

        <h5 class="pl-5 mt-5">EASY ACCESS</h5>
        <div class="row p-shortcut-row">
            <div class="col-lg-3 col-md-6 pb-2">
                <div class="card bg-bluegray">
                    @if (\Auth::check())

                        @if(Auth::user()->is_admin == 1 || Auth::user()->is_faculty == 1)
                            <a class="link-primary" href="{{URL('/faculty_profile?user_id='.Auth::id())}}">
                                @elseif(Auth::user()->is_student == 1)
                                    <a class="link-primary" href="{{URL('/student_profile?user_id='.Auth::id())}}">
                                        @endif
                                        @endif
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
    </div>
@endsection
