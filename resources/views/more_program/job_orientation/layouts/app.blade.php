<!DOCTYPE html>
<html lang="en">
    @include("layouts.styles")
    <body class="hold-transition sidebar-mini sidebar-collapse" data-message="{{Session::get('message')}}">
        <div class="wrapper">
            @include("layouts.common.navbar")
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <div class="navbar-blue">
                    <a href="{{url('/home')}}" class="brand-link" style="margin-left:-14px">
                        <img src="{{url('images/ggi-gold.png')}}" alt="AdminLTE Logo" class="brand-image-xs">
                        <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600"></span>
                    </a>
                </div>
                @include("layouts.common.sidebar")
            </aside>
            <div class="content-wrapper">
                @include("layouts.common.alert")
                @yield("content")
            </div>
            @include("layouts.common.footer")
        </div>
        @include("layouts.scripts")
        @yield("script")
    </body>
</html>