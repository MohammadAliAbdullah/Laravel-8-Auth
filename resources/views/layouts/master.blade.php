<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.master.topHeader')
@stack('body_start')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('partials.master.header')
        @stack('sidebar_start')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('partials.master.orgnization')
            <div class="sidebar">
                @include('partials.master.user')
                @include('partials.master.sideBar')
            </div>
        </aside>
        @stack('sidebar_start')
        <div class="content-wrapper">
            @include('partials.master.pageHeader')
            
                    @include('partials.master.mainContent')
                </div>

        @stack('sidebar_end')
        @include('partials.master.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('partials.master.downFooter')
    @stack('body_end')
</body>
</html>
