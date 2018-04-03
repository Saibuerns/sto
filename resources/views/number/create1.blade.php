@extends('layout.app')
@section('content2')
    <div class="row" style="margin-top: 20%">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">IMPRESIÓN DE TURNO</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="btn-group-vertical btn-block btn-group-lg">
                                @foreach($entitys as $entity)
                                    <button type="button"
                                            class="btn btn-default"
                                            onclick="window.location = '{!! route('number.create2', ['idEntity' => $entity->id]) !!}'">{!! strtoupper($entity->name) !!}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection