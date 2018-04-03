@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Nueva Sub Entidad</h3>
        </div>
        <form action="{!! route('subentity.store') !!}" method="post" role="form">
            {!! csrf_field() !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group input-group-md">
                            <label for="entityName">Nombre</label>
                            <input type="text" class="form-control" name="subEntityName" id="subEntityName" autofocus
                                   maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="entityDescription">Descripción</label>
                            <input type="text" class="form-control" name="subEntityDescription"
                                   id="subEntityDescription">
                        </div>
                        <div class="form-group">
                            <select name="entity" id="entitys"
                                    class="form-control" {!! !is_array($entitys) ? 'disabled' : '' !!} required>
                                @if(is_array($entitys))
                                    <option value=""> -- Seleccionar --</option>
                                    @foreach($entitys as $entity)
                                        <option value="{!! $entity->id !!}">{!! $entity->name !!}</option>
                                    @endforeach
                                @else
                                    <option value="{!! $entity->id !!}" selected>{!! $entity->name !!}</option>
                                @endif
                            </select>
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
@endsection