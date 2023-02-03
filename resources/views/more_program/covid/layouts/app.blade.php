<!DOCTYPE html>
<html lang="en">
    @include("more_program.covid.layouts.styles")
    <body>
        @yield("content")
        
        @stack("scripts")
        @yield("script")
    </body>
</html>