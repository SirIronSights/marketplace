<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
    @include('partials.nav')
    <main style="padding-top: 5px;">
    @yield('content')
    </main>
</body>
</html>