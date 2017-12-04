@extends('main')

@section('title', 'Meeting detail')

@section('content')

<p><strong>From:</strong> {{ $meeting->name1 }}</p>
<p><strong>To:</strong> {{ $meeting->name2 }}</p>
<p><strong>Date:</strong> {{ $meeting->date }}</p>
<p><strong>Location:</strong> {{ $meeting->location }}</p>

<p><strong>Created:</strong> {{ $meeting->created_at }}</p>
<p><strong>Updated:</strong> {{ $meeting->created_at }}</p>

<p>
    <a href="{{ route('meetings.delete', ['id' => $meeting->id]) }}"
        class="btn btn-outline-danger">Delete</a>
    <a href="{{ route('meetins') }}">Back to meetings</a>
</p>
@endsection
