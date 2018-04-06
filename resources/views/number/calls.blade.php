<!DOCTYPE html>
<html lang="es">
@include('layout.sections.head')
<body style="background-color: #0000F0">
<div class="container-fluid">
    <div class="row" style="margin-top: 5%;">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Imagenes</h3>
                </div>
                <div class="panel-body">
                    @if(isset($file))
                        @include('layout.components.video')
                    @else
                        @include('layout.components.thumbnails')
                    @endif
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div id="numbersList">
                @include('layout.components.numberList')
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</div>
<!--/.fluid-container-->
@include('layout.sections.libsJS')
@include('sweet::alert')
@stack('scriptsJS')
</body>
</html>
