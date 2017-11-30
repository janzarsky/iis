@extends('main')

@section('title', 'Create meeting')

@section('content')
{{ Form::open(['url' => 'meetings/create']) }}

<div class="form-group">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('with', 'With') }}
    {{ Form::select('with', $available_users, '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Submit!') }}
</div>

{{ Form::close() }}
@endsection
