@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Login Using Social Sites</h2>
            <a class="btn btn-primary" href="{{ route('login', ['github']) }}">Github</a>
            <a class="btn btn-primary" href="{{ route('login', ['facebook']) }}">Facebook</a>
            <a class="btn btn-primary" href="{{ route('login', ['google']) }}">Google</a>
        </div>
    </div>
@stop