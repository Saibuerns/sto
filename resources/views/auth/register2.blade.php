@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Nuevo Usuario</h3>
        </div>
        <form action="{!! route('user.store') !!}" method="post" role="form">
            {!! csrf_field() !!}
            <div class="panel-body">
                <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" autofocus required>
                </div>
                <div class="form-group">
                    <label for="firstName">Nombre</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password2">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="password2" id="password2" required>
                </div>
                <div class="row">
                    @component('layout.components.selectEntity_SubEntity_Boxes', ['entitys' => $entitys, 'entityAttr' => '', 'subEntityAttr' => '', 'boxAttr' => ''])
                    @endcomponent
                </div>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-primary">Limpiar</button>
                <button type="submit" class="btn btn-success pull-right">Registrarse</button>
            </div>
        </form>
    </div>
@endsection
@push('scriptsJS')
    <script type="text/javascript">
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("password2");

        function validatePassword() {
            if (password.value.length < 6 || password.value.length > 12) {
                password.setCustomValidity("La contraseña debe contener entre 6 y 12 caracteres alfanumericos");
            } else {
                password.setCustomValidity("");
            }
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Las contraseñas deben ser iguales");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endpush
