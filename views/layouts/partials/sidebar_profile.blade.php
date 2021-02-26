<div class="col-auto">

    <div class="row no-gutters mt-5">

        <div class="user-menu-button dropdown">

            <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button"
                 id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar-wrapper">
                    @if (\Auth::check())

                        @if(Auth::user()->is_admin == 1)
                            @if(\App\User::where('id',Auth::id())->pluck('profile_pic')->first())
                                <img class="avatar"
                                     src="{{\App\User::where('id',Auth::id())->pluck('profile_pic')->first()}}">
                            @else
                                <img class="avatar" src="img/profile.jpg">
                            @endif
                        @endif
                        @if(Auth::user()->is_student == 1)
                            @if(\App\User::where('id',Auth::id())->pluck('profile_pic')->first())
                                <img class="avatar"
                                     src="{{\App\User::where('id',Auth::id())->pluck('profile_pic')->first()}}">
                            @else
                                <img class="avatar" src="img/profile.jpg">
                            @endif
                        @endif
                            @if(Auth::user()->is_faculty == 1)
                                @if(\App\User::where('id',Auth::id())->pluck('profile_pic')->first())
                                    <img class="avatar"
                                         src="{{\App\User::where('id',Auth::id())->pluck('profile_pic')->first()}}">
                                @else
                                    <img class="avatar" src="img/profile.jpg">
                                @endif
                            @endif
                    @endif
                </div>
                <span class="username mx-3 d-md-block">{{Auth::user()->name}}</span>
            </div>

            <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                @if (\Auth::check())

                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_faculty == 1)
                        <a class="dropdown-item" href="{{URL('/faculty_profile?user_id='.Auth::id())}}">
                    @elseif(Auth::user()->is_student == 1)
                        <a class="dropdown-item" href="{{URL('/student_profile?user_id='.Auth::id())}}">
                    @endif

                            <div class="row no-gutters flex-nowrap">
                                <i class="icon-account text-dark mt-3"></i>
                                <span class="px-3">My Profile</span>
                            </div>
                        </a>
                @endif

                        <a class="dropdown-item"
                           href="{{ URL('/change_password') }}">
                            <div class="row no-gutters flex-nowrap">
                                <i class="icon-lock-reset text-dark mt-3"></i>
                                <span class="px-3">Change Password</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="row no-gutters flex-nowrap">
                                <i class="icon-logout text-dark mt-3"></i>
                                <span class="px-3">Logout</span>
                            </div>
                        </a>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
