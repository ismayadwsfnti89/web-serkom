<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
</head>
<body>

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main Wrapper --}}
    <div class="main-wrapper" id="mainWrapper">

        {{-- Header --}}
        @include('layouts.header')

        {{-- Main Content --}}
        <main class="dashboard-content" id="main-content">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('layouts.footer')
    </div>

    {{-- Scripts --}}
    @include('layouts.scripts')
</body>
</html>
