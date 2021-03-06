@extends('main')

@section('title', 'Meetings')

@section('content')
<p>
    <a href="{{ route('meetings.create') }}" class="btn btn-primary">Create meeting</a>
</p>

<h3>Invites</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invites as $m)
        <tr>
            <td>{{ $m->name1 }}</td>
            <td>{{ $m->name2 }}</td>
            <td>{{ $m->date }}</td>
            <td>{{ $m->location }}</td>
            <td>
                <a href="{{ route('meetings.accept', ['id' => $m->id]) }}"
                    class="btn btn-primary">Accept meeting</a>
                <a href="{{ route('meetings.detail', ['id' => $m->id]) }}"
                    class="btn btn-outline-primary">Detail</a>
                <a href="{{ route('meetings.delete', ['id' => $m->id]) }}"
                    class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Waiting for acceptation</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($waiting as $m)
        <tr>
            <td>{{ $m->name1 }}</td>
            <td>{{ $m->name2 }}</td>
            <td>{{ $m->date }}</td>
            <td>{{ $m->location }}</td>
            <td>
                <a href="{{ route('meetings.detail', ['id' => $m->id]) }}"
                    class="btn btn-outline-primary">Detail</a>
                <a href="{{ route('meetings.delete', ['id' => $m->id]) }}"
                    class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Upcoming</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($upcoming as $m)
        <tr>
            <td>{{ $m->name1 }}</td>
            <td>{{ $m->name2 }}</td>
            <td>{{ $m->date }}</td>
            <td>{{ $m->location }}</td>
            <td>
                <a href="{{ route('meetings.detail', ['id' => $m->id]) }}"
                    class="btn btn-outline-primary">Detail</a>
                <a href="{{ route('meetings.delete', ['id' => $m->id]) }}"
                    class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Past</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($past as $m)
        <tr>
            <td>{{ $m->name1 }}</td>
            <td>{{ $m->name2 }}</td>
            <td>{{ $m->date }}</td>
            <td>{{ $m->location }}</td>
            <td>
                <a href="{{ route('meetings.detail', ['id' => $m->id]) }}"
                    class="btn btn-outline-primary">Detail</a>
                <a href="{{ route('meetings.delete', ['id' => $m->id]) }}"
                    class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
