<!DOCTYPE html>
<html lang="es">
@include('layout.sections.head')
<body style="background-color: #0000F0">
<header>
    <nav class="navbar" role="navigation"></nav>
</header>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img src="{!! url()->to('/images') . '/credifiar_logo.jpg' !!}" class="img-responsive center-block logo-img">
                </div>
            </div>
            <div class="row top-buffer">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">SOLICITAR TURNO</h3>
                        </div>
                        <div class="panel-body">
                            @yield('content2')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.sections.libsJS')
@include('sweet::alert')
@stack('scriptsJS')
</body>
</html>