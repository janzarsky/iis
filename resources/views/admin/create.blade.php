@extends('main')

@section('title', 'Create user')

@section('content')
{{ Form::open(['url' => 'admin/create']) }}

<div class="form-group required">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', '', ['class' => 'form-control ' .
        ($errors->has('name') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group required">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', '', ['class' => 'form-control ' .
        ($errors->has('email') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group required">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control ' .
        ($errors->has('password') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group required">
    {{ Form::label('role', 'Role') }}
    {{ Form::select('role', ['alcoholic' => 'Alcoholic',
        'specialist' => 'Specialist', 'admin' => 'Admin'], '',
        ['class' => 'form-control ' .
        ($errors->has('role') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('alcoholic', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Create user', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('admin') }}">Back to users</a>
</div>

{{ Form::close() }}
@endsection
