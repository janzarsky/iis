@extends('main')

@section('title', 'Edit user')

@section('content')
{{ Form::open(['url' => 'admin/edit']) }}

{{ Form::hidden('id', $user->id) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', $user->name, ['class' => 'form-control ' .
        ($errors->has('name') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', $user->email, ['class' => 'form-control ' .
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
    {{ Form::label('role', 'Role') }}
    {{ Form::select('role', ['alcoholic' => 'Alcoholic',
        'specialist' => 'Specialist', 'admin' => 'Admin'], $user->role,
        ['class' => 'form-control ' .
        ($errors->has('role') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('alcoholic', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
</div>

{{ Form::close() }}

<a href="{{ route('admin') }}">Back to all users</a>
@endsection
