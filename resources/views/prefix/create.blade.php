@extends('layout.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Asignar Prefijo</h3>
        </div>
        <form action="{!! route('prefix.store') !!}" method="post" role="form">
            {!! csrf_field() !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="idSubEntity">Nro Sub Entidad</label>
                            <input type="text" class="form-control" id="idSubEntity" name="idSubEntity"
                                   value="{!! $subEntity->id !!}" readonly>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="entityName">Sub Entidad</label>
                            <input type="text" class="form-control" id="subEntityName" name="subEntityName"
                                   value="{!! $subEntity->name !!}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="prefix">Prefijo</label>
                            <input type="text" class="form-control" name="prefix" id="prefix" autofocus maxlength="5"
                                   required onkeyup="upperCase(this)">
                            <span class="help-block">Es de gran utilidad que el prefijo sea la primera letra de la sub entidad, si esta ya existe se le agrega la segunda</span>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="from">Comienzo</label>
                            <input type="number" class="form-control" name="from" id="from" value="1" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Hasta</label>
                            <input type="number" class="form-control" name="to" id="to" value="999" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="to">Prioridad</label>
                            <input type="number" class="form-control" name="priority" id="priority">
                            <span class="help-block">Si no se asigna una prioridad, los numeros seran ordenados segun cantidad</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-primary pull-right">Asignar</button>
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
