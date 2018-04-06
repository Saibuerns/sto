@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nueva Entidad</h3>
                </div>
                <form action="{!! route('entity.store') !!}" method="post" role="form">
                    {!! csrf_field() !!}
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group input-group-md">
                                    <label for="entityName">Nombre</label>
                                    <input type="text" class="form-control" name="entityName" id="entityName" autofocus
                                           maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <label for="entityDescription">Descripción</label>
                                    <input type="text" class="form-control" name="entityDescription"
                                           id="entityDescription">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


