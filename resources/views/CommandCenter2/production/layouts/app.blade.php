<!DOCTYPE html>
<html lang="en">
    @include("layouts.styles")
    <body>
        @yield("content")
        
        @include("layouts.scripts")
        @yield("script")
    </body>
</html>