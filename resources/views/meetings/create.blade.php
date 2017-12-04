@extends('main')

@section('title', 'Create meeting')

@section('content')
{{ Form::open(['url' => 'meetings/create']) }}

<div class="form-group required">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', '', ['class' => 'form-control ' .
        ($errors->has('location') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group required">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', Carbon\Carbon::today()->format('Y-m-d'),
        ['class' => 'datepicker form-control ' .
        ($errors->has('date') ? 'is-invalid' : '')]) }}
    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group required">
    {{ Form::label('with', 'With') }}
    {{ Form::select('with', $available_users, '', ['class' => 'form-control ' .
        ($errors->has('with') ? 'is-invalid' : '')]) }}
    {!! $errors->first('with', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Create meeting', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('meetings') }}">Back to meetings</a>
</div>

{{ Form::close() }}
@endsection
