@extends('main')

@section('title', 'Users')

@section('content')
<a href="{{ route('admin.create') }}">Create user</a>

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
            <td>{{ $u->name }}</td>
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
            <td>{{ $u->specialist_name }}</td>
            <td>
                <a href="{{ route('admin.detail', ['id' => $u->id]) }}">Detail</a>
                <a href="{{ route('admin.edit', ['id' => $u->id]) }}">Edit</a>
                <a href="{{ route('admin.delete', ['id' => $u->id]) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
