<!DOCTYPE html>
<html lang="en">

<head>
    @include('_partials.head')
    @yield('css')
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                @include('_partials.navbar')
            </header>

            <div class="content-wrapper container">
                @yield('content')
            </div>

            @include('_partials.footer')
        </div>
    </div>
    @include('_partials.js')
    @yield('js')
</body>

</html>
