<!DOCTYPE html>
<html lang="es">
@include('layout.sections.head')
<body>
@include('layout.sections.header')
<div class="container">@yield('content')</div>
<!-- /.container -->
@include('layout.sections.footer')
@include('layout.sections.libsJS')
@stack('scriptsJS')
</body>
</html>