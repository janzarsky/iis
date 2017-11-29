@extends('main')

@section('title', 'Create meeting')

@section('content')
{{ Form::open(['url' => 'meetings/create']) }}

<p>
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location') }}
</p>

<p>
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date') }}
</p>

<p>
    {{ Form::label('with', 'With') }}
    {{ Form::select('with', $available_users) }}
</p>

<p>
    {{ Form::submit('Submit!') }}
</p>

{{ Form::close() }}
@endsection
