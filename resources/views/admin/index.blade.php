@extends('main')

@section('title', 'Users')

@section('content')

<p>
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Create user</a>
</p>

<h3>All users</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Is patron?</th>
            <th scope="col">Specialist</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
        <tr>
            <td>
                <a href="{{ route('admin.detail', ['id' => $u->id]) }}">
                    {{ $u->name }}</a>
            </td>
            <td>{{ $u->email }}</td>
            <td>
            @if ($u->is_alcoholic)
                Alcoholic
            @elseif ($u->is_specialist)
                Specialist
            @elseif ($u->is_admin)
                Admin
            @else
                None
            @endif
            </td>
            <td>
            @if ($u->is_patron)
                Yes
            @else
                No
            @endif
            </td>
            <td>
                <a href="{{ route('admin.detail', ['id' => $u->specialist_id]) }}">
                    {{ $u->specialist_name }}</a>
            </td>
            <td>
                <a href="{{ route('admin.edit', ['id' => $u->id]) }}"
                    class="btn btn-outline-primary">Edit</a>
                <a href="{{ route('admin.delete', ['id' => $u->id]) }}"
                    class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
