@extends('main')

@section('title', 'Add check')

@section('content')
{{ Form::open(['url' => 'checks/create']) }}

<div class="form-group">
    {{ Form::label('alcoholic_id', 'Alcoholic') }}
    {{ Form::select('alcoholic_id', $alcoholics, '',
        ['class' => 'form-control ' .
        ($errors->has('alcoholic_id') ? 'is-invalid' : '') ]) }}
    {!! $errors->first('alcoholic_id', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('amount', 'Alcohol amount') }}
    <div class="input-group">
    {{ Form::number('amount', '0.00', ['class' => 'form-control ' .
        ($errors->has('amount') ? 'is-invalid' : ''), 'min' => 0, 'max' => 1000,
        'step' => 0.01]) }}
      <span class="input-group-addon">‰</span>
    </div>
    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::submit('Add check', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('checks') }}">Back to checks</a>
</div>

{{ Form::close() }}
@endsection
