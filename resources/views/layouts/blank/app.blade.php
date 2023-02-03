<!DOCTYPE html>
<html lang="en">
    @include("layouts.styles")
    <body class="bodyBlank">
        @yield("content")
        
        @include("layouts.scripts")
        @yield("script")
    </body>
</html>