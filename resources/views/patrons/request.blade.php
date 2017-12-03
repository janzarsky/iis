@extends('main')

@section('title', 'Request patron')

@section('content')
{{ Form::open(['url' => 'patrons/request']) }}

<div class="form-group">
    {{ Form::label('patron_id', 'Patron') }}
    {{ Form::select('patron_id', $options, '',
        ['class' => 'form-control ' .
        ($errors->has('patron_id') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('patron_id', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Request patron', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('admin') }}">Back to patrons</a>
</div>

{{ Form::close() }}
@endsection
