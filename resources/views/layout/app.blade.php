<!DOCTYPE html>
<html lang="es">
@include('layout.sections.head')
<body>
<div class="container">@yield('content2')</div>

@include('layout.sections.header')
<div class="container">@yield('content')</div>
<!-- /.container -->
@include('layout.sections.footer')

@include('layout.sections.libsJS')
@include('sweet::alert')
@stack('scriptsJS')
</body>
</html>