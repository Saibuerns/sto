@extends('layout.app2')
@section('content2')
    @foreach($subEntitys as $subEntity)
        <button type="button" class="btn btn-success btn-lg btn-block well-lg"
                onclick="window.location = '{!! route('number.store', ['idSubEntity' => $subEntity->id]) !!}'">{!! mb_strtoupper($subEntity->name) !!}
        </button>
        <br>
    @endforeach
@endsection
