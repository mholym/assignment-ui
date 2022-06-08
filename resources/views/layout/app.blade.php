<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
</head>

<body>
@include('layout.partials.header')
@include('layout.partials.nav')

<main id="content">
    @yield('content')
</main>

@include('layout.partials.footer')
<!-- Bootstrap & Custom JavaScript -->
@include('layout.partials.footer-scripts')
</body>
</html>
