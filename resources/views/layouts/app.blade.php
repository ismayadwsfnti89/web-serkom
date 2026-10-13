<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
</head>
<body>

    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.header')

        <main class="dashboard-content">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    @include('layouts.scripts')
</body>
</html>
