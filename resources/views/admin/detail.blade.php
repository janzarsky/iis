@extends('main')

@section('title', 'User detail')

@section('content')
<p>
{{ json_encode($user, JSON_PRETTY_PRINT) }}
</p>

<a href="{{ route('admin') }}">Back to all users</a>
@endsection
