<!doctype html>
<html lang="en">

<head>
    @include('admin.blocks.head')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
             @include('admin.blocks.header')
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                @include('admin.blocks.sidebar')
            </div>

            <div class="app-main__outer">
                <!-- Main -->
                 @yield('content')
                <!-- End Main -->
            </div>
        </div>

    </div>
    
    @include('admin.blocks.footer')
</body>

</html>