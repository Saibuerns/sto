@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Editar Prefijo</h3>
        </div>
        <form action="{!! route('prefix.update', ['idPrefix' => $prefix->id]) !!}" method="post" role="form">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="idSubEntity">Nro Sub Entidad</label>
                            <input type="text" class="form-control" id="idSubEntity" name="idSubEntity"
                                   value="{!! $prefix->subEntity->id !!}" readonly>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="subEntityName">Sub Entidad</label>
                            <input type="text" class="form-control" id="subEntityName" name="subEntityName"
                                   value="{!! $prefix->subEntity->name !!}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="prefix">Prefijo</label>
                            <input type="text" class="form-control" name="prefix" id="prefix" autofocus
                                   maxlength="5" required value="{{$prefix->prefix}}">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="from">Comienzo</label>
                            <input type="number" class="form-control" name="from" id="from" value="{{$prefix->from}}"
                                   required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Hasta</label>
                            <input type="number" class="form-control" name="to" id="to" value="{{$prefix->to}}"
                                   required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Prioridad</label>
                            <input type="number" class="form-control" name="priority" id="priority"
                                   value="{{$prefix->priority}}" required>
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
@push('scriptsJS')
    <script type="text/javascript">
        $('#prefix').on('change', function () {
            url = '{!! url()->to('/') !!}' + '/components/subentitys/' + {!! $subEntity->id !!} +'/prefixs/' + this.value + '/exist';
            $.getJSON(url, function (data) {
                prefix = document.getElementById('prefix');
                if (!jQuery.isEmptyObject(data) || !(Array.isArray(data) && data.length == 0)) {
                    prefix.setCustomValidity("El prefijo ingresado ya existe, por favor ingrese otro");
                } else {
                    prefix.setCustomValidity("");
                }
            });
        });
    </script>
@endpush
