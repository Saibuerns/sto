@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="idSubEntity">Nro Sub Entidad</label>
                <input type="number" class="form-control" id="idSubEntity" name="idSubEntity"
                       value="{!! $subEntity->id !!}" readonly>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="idSubEntity">Nombre</label>
                <input type="text" class="form-control" id="nameSubEntity" name="nameSubEntity"
                       value="{!! $subEntity->name !!}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="descriptionSubEntity">Descripción</label>
                <input type="text" class="form-control" id="descriptionSubEntity"
                       name="descriptionSubEntity" value="{!! $subEntity->description !!}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Prefijos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Prefijo</th>
                                <th>Comienzo</th>
                                <th>Reinicio</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subentity->prefixs as $prefix)
                                <tr>
                                    <td>{!! $prefix->prefix !!}</td>
                                    <td>{!! $prefix->start !!}</td>
                                    <td>{!! $prefix->reset !!}</td>
                                    <td>
                                        <button class="btn btn-success">Editar</button>
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
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Boxes</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subentity->boxes as $box)
                                <tr>
                                    <td>{!! $box->name !!}</td>
                                    <td>{!! $box->description !!}</td>
                                    <td>
                                        <button class="btn btn-success">Editar</button>
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
@endsection