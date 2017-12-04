@extends('main')

@section('title', 'Sessions')

@section('content')

<p>
    <a href="{{ route('sessions.create') }}" class="btn btn-primary">Create session</a>
</p>

<h3>Sessions created by me</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Organizer</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Attendees</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($organizing))
            @foreach ($organizing as $s)
            <tr>
                <td>{{ $s->organizer_name }}</td>
                <td>{{ $s->date }}</td>
                <td>{{ $s->location }}</td>
                <td>{{ (array_key_exists($s->id, $counts)) ? $counts[$s->id] : 0 }}</td>
                <td>
                        <a href="{{ route('sessions.detail', ['id' => $s->id]) }}"
                            class="btn btn-outline-primary">Detail</a>
                        <a href="{{ route('sessions.delete', ['id' => $s->id]) }}"
                            class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

<h3>Sessions I attend</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Organizer</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Attendees</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($attending))
            @foreach ($attending as $s)
            <tr>
                <td>{{ $s->organizer_name }}</td>
                <td>{{ $s->date }}</td>
                <td>{{ $s->location }}</td>
                <td>{{ (array_key_exists($s->id, $counts)) ? $counts[$s->id] : 0 }}</td>
                <td>
                        <a href="{{ route('sessions.detail', ['id' => $s->id]) }}"
                            class="btn btn-outline-primary">Detail</a>
                        <a href="{{ route('sessions.cancel', ['id' => $s->id]) }}"
                            class="btn btn-outline-warning">Do not attend</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

<h3>Other sessions</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Organizer</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Attendees</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($other))
            @foreach ($other as $s)
            <tr>
                <td>{{ $s->organizer_name }}</td>
                <td>{{ $s->date }}</td>
                <td>{{ $s->location }}</td>
                <td>{{ (array_key_exists($s->id, $counts)) ? $counts[$s->id] : 0 }}</td>
                <td>
                        <a href="{{ route('sessions.detail', ['id' => $s->id]) }}"
                            class="btn btn-outline-primary">Detail</a>
                        <a href="{{ route('sessions.attend', ['id' => $s->id]) }}"
                            class="btn btn-outline-success">Attend</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
