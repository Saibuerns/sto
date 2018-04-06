@extends('layout.app2')
@section('content2')
    @foreach($entitys as $entity)
        <button type="button"
                class="btn btn-success btn-lg btn-block well-lg"
                onclick="window.location = '{!! route('number.create2', ['idEntity' => $entity->id]) !!}'">
            {!! mb_strtoupper($entity->name) !!}
        </button>
        <br>
    @endforeach
@endsection