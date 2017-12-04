@extends('main')

@section('title', 'Create session')

@section('content')
{{ Form::open(['url' => 'sessions/create']) }}

<div class="form-group">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', '', ['class' => 'form-control ' .
        ($errors->has('location') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', Carbon\Carbon::today()->format('Y-m-d'),
        ['class' => 'datepicker form-control ' .
        ($errors->has('date') ? 'is-invalid' : '')]) }}
    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Create session', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('sessions') }}">Back to sessions</a>
</div>

{{ Form::close() }}
@endsection
