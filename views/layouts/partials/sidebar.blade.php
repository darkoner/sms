<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md"
       data-fuse-bar-position="left">
    <div class="aside-content bg-primary-700 text-auto">

        @include('layouts.partials.sidebar_profile')

        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

            <div class="dropdown-divider mt-5"></div>

            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/home')}}"
                   data-url="{{URL('/home')}}">
                    <i class="icon s-4 icon-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->is_admin == 1)
                <li class="subheader">
                    <span>To Do</span>
                </li>

                <li class="nav-item" role="tab" id="heading-faculty" >
                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse"
                        data-target="#collapse-dashboards-faculty" href="#" aria-expanded="false"
                        aria-controls="collapse-dashboards">
                        <i class="icon s-4 icon-people"></i>
                        <span>Faculty</span>
                    </a>
                    <ul id="collapse-dashboards-faculty" class='collapse ' role="tabpanel" aria-labelledby="heading-faculty"
                        data-children=".nav-item">
                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/add_faculty')}}" data-url="{{URL('/add_faculty')}}">
                                <span>Add New</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/faculty_list')}}" data-url="{{URL('/faculty_list')}}">
                                <span>List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" role="tab" id="heading-student">

                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse"
                       data-target="#collapse-dashboards-student" href="#" aria-expanded="false"
                       aria-controls="collapse-dashboards">
                        <i class="icon s-4 icon-account-settings-variant"></i>
                        <span>Student</span>
                    </a>

                    <ul id="collapse-dashboards-student" class='collapse ' role="tabpanel" aria-labelledby="heading-student"
                        data-children=".nav-item">
                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/add_student')}}" data-url="{{URL('/add_student')}}">
                                <span>Add New</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/student_list')}}" data-url="{{URL('/student_list')}}">
                                <span>List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" role="tab" id="heading-attendance" >
                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse"
                       data-target="#collapse-dashboards-attendance" href="#" aria-expanded="false"
                       aria-controls="collapse-dashboards">
                        <i class="icon s-4 icon-counter"></i>
                        <span>Attendance</span>
                    </a>
                    <ul id="collapse-dashboards-attendance" class='collapse' role="tabpanel" aria-labelledby="heading-attendance"
                        data-children=".nav-item">
                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/add_attendance')}}" data-url="{{URL('/add_attendance')}}">
                                <span>Add New</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/attendance_list')}}" data-url="{{URL('/attendance_list')}}">
                                <span>List</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
                @if (Auth::user()->is_faculty == 1)
                <li class="subheader">
                    <span>To Do</span>
                </li>
                <li class="nav-item" role="tab" id="heading-attendance" >
                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse"
                       data-target="#collapse-dashboards-attendance" href="#" aria-expanded="false"
                       aria-controls="collapse-dashboards">
                        <i class="icon s-4 icon-counter"></i>
                        <span>Attendance</span>
                    </a>
                    <ul id="collapse-dashboards-attendance" class='collapse' role="tabpanel" aria-labelledby="heading-attendance"
                        data-children=".nav-item">
                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/add_attendance')}}" data-url="{{URL('/add_attendance')}}">
                                <span>Add New</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple"
                               href="{{URL('/attendance_list')}}" data-url="{{URL('/attendance_list')}}">
                                <span>List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif


            @if (Auth::user()->is_student == 1)
                <li class="subheader">
                    <span>Reports</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/project_list')}}"
                       data-url="{{URL('/project_list')}}">
                        <i class="icon s-4 icon-data"></i>
                        <span>Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/new_project')}}"
                       data-url="{{URL('/new_project')}}">
                        <i class="icon s-4 icon-worker"></i>
                        <span>Assignments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/new_project')}}"
                       data-url="{{URL('/new_project')}}">
                        <i class="icon s-4 icon-question-mark-circle"></i>
                        <span>Quiz</span>
                    </a>
                </li>
            @endif

{{--            @if(Auth::user()->is_client == 1 || Auth::user()->is_admin == 1)--}}
{{--                <li class="subheader">--}}
{{--                    <span>Case Study</span>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link ripple" href="{{URL('/case_study_view')}}" data-url="{{URL('/case_study_view')}}">--}}
{{--                        <i class="icon s-4  icon-animation"></i>--}}
{{--                        <span>Case Studies</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

            @if(Auth::user()->is_admin == 1)
                <li class="subheader">
                    <span>Settings</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/course')}}" data-url="{{URL('/course')}}">
                        <i class="icon s-4 icon-settings"></i>
                        <span>Course</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/semester')}}" data-url="{{URL('/semester')}}">
                        <i class="icon s-4 icon-account-box"></i>
                        <span>Semester</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple" href="{{URL('/subject')}}" data-url="{{URL('/subject')}}">
                        <i class="icon s-4 icon-account-box"></i>
                        <span>Subject</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
