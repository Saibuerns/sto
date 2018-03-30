@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-info">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                <strong>Entidad: {!! $entityName !!}!</strong>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">SUB ENTIDADES</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Creada el</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subEntitys as $subEntity)
                    <tr>
                        <td>{{$subEntity->id}}</td>
                        <td>{{$subEntity->name}}</td>
                        <td>{{$subEntity->description}}</td>
                        <td>{{$subEntity->created_at->toDateString()}}</td>
                        <td>
                            <button id="modifySE" type="button" class="btn btn-info">Editar</button>
                        </td>
                        <td>
                            <button id="softDeleteSE" type="button" class="btn btn-danger">Baja</button>
                        </td>
                        <td>
                            <button id="newPrefix" type="button" class="btn btn-success"
                                    onclick="window.location='{!! route('entity.subentity.prefix.create', ['idSubEntity' => $subEntity->id]) !!}'">
                                Nuevo Prefix
                            </button>
                        </td>
                        <td>
                            <button id="newBox" type="button" class="btn btn-success"
                                    onclick="window.location='{!! route('entity.subentity.box.create', ['idSubEntity' => $subEntity->id]) !!}'">
                                Nuevo Box
                            </button>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection