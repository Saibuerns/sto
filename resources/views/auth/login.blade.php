@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Inicio de Sesión</h3>
                </div>
                <form action="{!! route('login') !!}" method="post" role="form">
                    {!! csrf_field() !!}
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-primary">Limpiar</button>
                        <button type="submit" class="btn btn-success pull-right">ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
