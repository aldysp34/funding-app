<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>@yield('title')</title>
        @include('layouts.partials.head')
    </head>
    
    <body class="layout-app layout-sticky-subnav has-drawer-opened">

        @include('layouts.partials.loader')
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">
                @include('layouts.partials.header')

                @include('layouts.partials.content')
                
            </div>
            @include('layouts.partials.sidebar')

        </div>
            @include('layouts.partials.footer-scripts')
    </body>
</html>