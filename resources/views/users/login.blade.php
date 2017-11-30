@extends('main')

@section('title', 'Login')

@section('content')
{{ Form::open(array('url' => 'login')) }}
<div class="form-group">
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', '', ['class' => 'form-control ' .
        ($errors->has('email') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control ' .
        ($errors->has('password') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Log in', ['class' => 'btn btn-primary']) }}
</div>

{{ Form::close() }}
@endsection
