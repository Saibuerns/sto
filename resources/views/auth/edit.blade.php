@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Editar Usuario</h3>
        </div>
        <form action="{!! route('user.update', ['idUser' => $user->id]) !!}" method="post" role="form">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="panel-body">
                <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <input type="text" class="form-control" name="lastName" id="lastName"
                           value="{!! $user->lastName !!}" autofocus required>
                </div>
                <div class="form-group">
                    <label for="firstName">Nombre</label>
                    <input type="text" class="form-control" name="firstName" id="firstName"
                           value="{!! $user->firstName !!}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{!! $user->email !!}"
                           required>
                </div>
                <div class="row">
                    @component('layout.components.selectEntity_SubEntity_Boxes', ['entitys' => $entitys, 'entityAttr' => '', 'subEntityAttr' => '', 'boxAttr' => ''])
                    @endcomponent
                </div>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-primary">Limpiar</button>
                <button type="submit" class="btn btn-success pull-right">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
