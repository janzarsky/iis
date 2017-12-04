@extends('main')

@section('title', 'Session detail')

@section('content')

<p><strong>Organizer:</strong> {{ $session->organizer_name }}</p>
<p><strong>Date:</strong> {{ $session->date }}</p>
<p><strong>Location:</strong> {{ $session->location }}</p>

<p><strong>Created:</strong> {{ $session->created_at }}</p>
<p><strong>Updated:</strong> {{ $session->created_at }}</p>

<p>
    <a href="{{ route('sessions') }}">Back to sessions</a>
</p>
@endsection
