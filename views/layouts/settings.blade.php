<?php
function current_page($uri = "/")
{
    $pos = strpos(request()->path(), $uri);

    if ($pos === 0 && (strlen(request()->path()) == strlen($uri)))
    {
        return true;
    } else
    {
        return false;
    }
}

?>

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

@include('layouts.partials.js')

<body class="layout layout-vertical layout-left-navigation layout-above-toolbar layout-above-footer">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><img src="img/progressive_material.png" width="170"></p>
        </div>
    </div>

<main>
    @include('layouts.partials.header')

    <div id="wrapper">

        @include('layouts.partials.sidebar_settings')

        <div class="content-wrapper">
            <div class="content custom-scrollbar">
                @yield('content')
            </div>
        </div>
    </div>
</main>

@include('layouts.partials.footer')

</body>
</html>
