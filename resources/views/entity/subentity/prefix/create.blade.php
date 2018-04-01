@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Nuevo Prefijo</h3>
        </div>
        <form action="{!! route('entity.subentity.prefix.store', ['idSubEntity', $subEntity->id]) !!}" method="post"
              role="form">
            {!! csrf_field() !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="idSubEntity">Nro Sub Entidad</label>
                            <input type="text" class="form-control" id="idEntity" name="idEntity"
                                   value="{!! $subEntity->id !!}" readonly>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="entityName">Sub Entidad</label>
                            <input type="text" class="form-control" id="entityName" name="entityName"
                                   value="{!! $subEntity->name !!}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="prefix">Prefijo</label>
                            <input type="text" class="form-control" name="prefix" id="prefix" autofocus
                                   maxlength="5" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="from">Comienzo</label>
                            <input type="number" class="form-control" name="from"
                                   id="from" value="1" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Hasta</label>
                            <input type="number" class="form-control" name="to"
                                   id="to" value="999" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Prioridad</label>
                            <input type="number" class="form-control" name="priority"
                                   id="priority" required>
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
