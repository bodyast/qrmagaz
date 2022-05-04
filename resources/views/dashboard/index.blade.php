@extends('dashboard.main.main')
@section('title')
    Dashboard
@stop

@section('page-css')
@stop

@section('content')
    <input type="hidden"
           name="_token"
           value="{!!csrf_token()!!}">



@endsection


@section('page-script')

@stop
