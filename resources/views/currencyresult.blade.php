@extends('base')
@section('content')
    <div class="alert alert-success">
        <strong>Current currency rate is {{$result['value']}}</strong>
    </div>
    <div class="area2">
        <input type="submit" class="btn btn-primary"
               value="Get more currency rate" onclick="history.go(-1);">
    </div>
@stop