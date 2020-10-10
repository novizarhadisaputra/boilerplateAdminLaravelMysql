<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard Page</title>
    @include('layouts.dashboard.styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.dashboard.navbar')
            @include('layouts.dashboard.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

        </div>
        <div class="modal fade modal-general" tabindex="-1" role="dialog" aria-labelledby=""
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
    </div>
    @include('layouts.dashboard.scripts')
</body>

</html>
