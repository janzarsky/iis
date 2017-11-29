@extends('main')

@section('title', 'Meeting detail')

@section('content')
<p>
{{ json_encode($meeting, JSON_PRETTY_PRINT) }}
</p>

<a href="{{ route('meetings') }}">Back to all meetings</a>
@endsection
