<!DOCTYPE html>
<html lang="es">
@include('layout.sections.head')
<body>
@if(Auth::check())
    @include('layout.sections.header')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('content2')
            </div>
        </div>
    </div>
@endif
<!-- /.container -->
@include('layout.sections.footer')

@include('layout.sections.libsJS')
@include('sweet::alert')
@stack('scriptsJS')
</body>
</html>