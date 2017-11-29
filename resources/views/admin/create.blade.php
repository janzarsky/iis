@extends('main')

@section('title', 'Create user')

@section('content')
{{ Form::open(['url' => 'admin/create']) }}

<p>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
</p>

<p>
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>
    {{ Form::label('role', 'Role') }}
    {{ Form::select('role', ['alcoholic' => 'Alcoholic',
        'specialist' => 'Specialist', 'admin' => 'Admin']) }}
</p>

<p>
    {{ Form::submit('Submit') }}
</p>

{{ Form::close() }}
@endsection
