@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Usuarios</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Creado el</th>
                                <th>Ultima modificación</th>
                                <th>Box asignado</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{!!$user->lastName  !!}</td>
                                    <td>{!!$user->firstName !!}</td>
                                    <td>{!!$user->email !!}</td>
                                    <td>{!!$user->created_at->format('d-m-Y')!!}</td>
                                    <td>{!!$user->updated_at->format('d-m-Y H:m:i')!!}</td>
                                    <td>{!! !is_null($user->box) ? $user->box->name : "<span class='label label-primary'>Administrador</span>" !!}</td>
                                    <td>
                                        <button class="btn btn-primary"
                                                onclick="window.location = '{!! route('user.edit', ['idUser' => $user->id]) !!}'">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning"
                                                onclick="window.location = '{!! route('password.request') !!}'">
                                            Reset contraseña
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger">Dar de baja</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button class="btn btn-success btn-block" onclick="window.location = '{!! route('user.create') !!}'">
                Nuevo Usuario
            </button>
        </div>
    </div>
@endsection