@extends('main')

@section('title', 'Checks')

@section('content')

<p>
    <a href="{{ route('checks.create') }}" class="btn btn-primary">Add check</a>
</p>

<h3>All checks</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Alcohol amount</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($checks))
            @foreach ($checks as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->amount/100 }} ‰</td>
                <td>
                    <a href="{{ route('checks.delete', ['id' => $c->id]) }}"
                        class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
