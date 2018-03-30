@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Nueva Sub Entidad</h3>
        </div>
        <form action="{!! route('entity.subentity.store', ['idEntity', $entity->id]) !!}" method="post" role="form">
            {!! csrf_field() !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="idEntity">Nro Entidad</label>
                            <input type="text" class="form-control" id="idEntity" name="idEntity"
                                   value="{!! $entity->id !!}" readonly>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="entityName">Entidad</label>
                            <input type="text" class="form-control" id="entityName" name="entityName"
                                   value="{!! $entity->name !!}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group input-group-md">
                            <label for="entityName">Nombre</label>
                            <input type="text" class="form-control" name="subEntityName" id="subEntityName" autofocus
                                   maxlength="50" required value="{!! $subEntity->name !!}">
                        </div>
                        <div class="form-group">
                            <label for="entityDescription">Descripción</label>
                            <input type="text" class="form-control" name="subEntityDescription"
                                   id="subEntityDescription" value="{!! $subEntity->description !!}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
    </div>
@endsection