<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.master.topHeader')
@stack('body_start')

<body>
    <div class="container">
        @yield('content')
    </div>
    @include('partials.master.downFooter')
    @stack('body_end')
</body>

</html>
