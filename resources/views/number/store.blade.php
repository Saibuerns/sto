@extends('layout.app')
@section('content2')
    {!! sleep(10); redirect()->route('number.create1'); !!}
@endsection