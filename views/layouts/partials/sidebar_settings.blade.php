<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md"
       data-fuse-bar-position="left">
    <div class="aside-content bg-primary-700 text-auto">

        @include('layouts.partials.sidebar_profile')

        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

            <div class="dropdown-divider mt-5"></div>

            <li class="nav-item">
                <a class="nav-link ripple {{current_page('home') ? 'active' : '' }}" href="{{URL('/home')}}"
                   data-url="{{URL('/home')}}">
                    <i class="icon s-4 icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="subheader">
                <span>Misc</span>
            </li>

            <!--Business-->
            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/settings_business')}}" data-url="{{URL('/settings_business')}}">
                    <i class="icon s-4 icon-domain"></i>
                    <span>Manufacturer</span>
                </a>
            </li>

            <!--Perforation Panel-->
            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/settings_perforation_panel')}}" data-url="{{URL('/settings_perforation_panel')}}">
                    <i class="icon s-4 icon-drag"></i>
                    <span>Perforation Panel</span>
                </a>
            </li>

            <li class="subheader">
                <span>Product</span>
            </li>
            <!--Product Type-->
            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/settings_product_type')}}" data-url="{{URL('/settings')}}">
                    <i class="icon s-4 icon-numeric-1-box-outline"></i>
                    <span>Product Type</span>
                </a>
            </li>
            <!--Product Category-->
            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/settings_product_category')}}" data-url="{{URL('/settings_product_category')}}">
                    <i class="icon s-4 icon-numeric-2-box-multiple-outline"></i>
                    <span>Grid Type</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/add_product')}}" data-url="{{URL('/add_product')}}">
                    <i class="icon s-4 icon-nut"></i>
                    <span>Add Product</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link ripple" href="{{URL('/product_list')}}" data-url="{{URL('/product_list')}}">
                    <i class="icon s-4 icon-library"></i>
                    <span>Product List</span>
                </a>
            </li>

{{--            <!--Case Studies-->--}}
{{--            <li class="subheader">--}}
{{--                <span>Case Studies</span>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link ripple" href="{{URL('/all_case_studies')}}"--}}
{{--                   data-url="{{URL('/all_case_studies')}}">--}}
{{--                    <i class="icon s-4 icon-animation"></i>--}}
{{--                    <span>Case Studies List</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link ripple" href="{{URL('/settings_case_study')}}" data-url="{{URL('/settings_case_study')}}">--}}
{{--                    <i class="icon s-4 icon-briefcase"></i>--}}
{{--                    <span>Add Case Study</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>

</aside>
