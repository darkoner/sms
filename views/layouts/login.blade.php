<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body class="layout layout-vertical layout-left-navigation layout-above-toolbar layout-above-footer">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label"><img src="img/logpng.png" width="170"></p>
    </div>
</div>

<main>

    <div id="wrapper" >
        {{--Settings Bar--}}
        <div class="content-wrapper" >
            <div class="content custom-scrollbar">

                <div id="login" class="p-8">

                    <div class="form-wrapper md-elevation-8 p-8">

                        <div class="align-content-center">
                            <img src="img/logpng.png" height="80">
                        </div>

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@include('layouts.partials.js')

</body>
</html>
