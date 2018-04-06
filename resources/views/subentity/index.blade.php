@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">SUB ENTIDADES</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Entidad</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Creada el</th>
                    <th>Prefijo</th>
                    <th>Boxes Asignados</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subEntitys as $subEntity)
                    <tr>
                        <td>{{$subEntity->entity->name}}</td>
                        <td role="button"
                            onclick="window.location='{!! route('subentity.show', ['idSubEntity' => $subEntity->id]) !!}'">{{$subEntity->name}}</td>
                        <td role="button"
                            onclick="window.location='{!! route('subentity.show', ['idSubEntity' => $subEntity->id]) !!}'">{{$subEntity->description}}</td>
                        <td role="button"
                            onclick="window.location='{!! route('subentity.show', ['idSubEntity' => $subEntity->id]) !!}'">{{$subEntity->created_at->format('d-m-Y')}}</td>
                        <td>
                            <strong>{{!is_null($subEntity->prefix) ? strtoupper($subEntity->prefix->prefix) : ''}}</strong>
                        </td>
                        <td>{{count($subEntity->boxes)}}</td>
                        <td>
                            <button id="modifySE" type="button" class="btn btn-info"
                                    onclick="window.location='{!! route('subentity.edit', ['idSubEntity' => $subEntity->id]) !!}'">
                                Editar
                            </button>
                        </td>
                        <td>
                            <button id="softDeleteSE" type="button" class="btn btn-danger">Baja</button>
                        </td>
                        <td>
                            @if(!is_null($subEntity->prefix))
                                <button id="editPrefix" type="button" class="btn btn-primary"
                                        onclick="window.location='{!! route('prefix.edit', ['idPrefix' => $subEntity->prefix->id]) !!}'">
                                    Editar Prefix
                                </button>
                            @else
                                <button id="newPrefix" type="button" class="btn btn-success"
                                        onclick="window.location='{!! route('prefix.create', ['idSubEntity' => $subEntity->id]) !!}'">
                                    Asignar Prefix
                                </button>
                            @endif
                        </td>
                        <td>
                            <button id="newBox" type="button" class="btn btn-success"
                                    onclick="window.location='{!! route('box.create', ['idSubEntity' => $subEntity->id]) !!}'">
                                Nuevo Box
                            </button>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-success btn-block" {!! $disabled !!}
                    onclick="window.location='{!! route('subentity.create')!!}'">Nueva Sub Entidad
            </button>
        </div>
    </div>
@endsection