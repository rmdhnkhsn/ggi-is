<!DOCTYPE html>
<html lang="en">
    @include("Error.layouts.styles")
    <body class="hold-transition sidebar-mini sidebar-collapse" data-message="{{Session::get('message')}}">
        <div class="wrapper">
            <aside class="main-sidebar sideBarV2">
                <div class="containerCaret">
                    <a href="#" class="caretBar" data-widget="pushmenu" role="button"><i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="fixedSide">
                    <a href="{{url('/home')}}" class="brand-link headerNav">
                        <div class="GoGreen">
                            <img src="{{url('images/iconpack/home/go-green2.svg')}}">
                        </div>
                        <div class="brand-text greentext">GO GREEN</div>
                    </a>
                    @include("layouts.common.sidebar")
                </div>
            </aside>
            <div class="content-wrapper">
                @yield("content")
            </div>
            <!-- @include("layouts.common.footer") -->
        </div>
        <script>
            $('.caretBar').click(function (e) {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                }
                else {
                    $(this).addClass("active");
                }
            });
        </script>
        @include("layouts.scripts")
        @yield("script")
    </body>
</html>