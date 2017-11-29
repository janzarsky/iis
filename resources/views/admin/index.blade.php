@extends('main')

@section('title', 'Users')

@section('content')
<a href="{{ route('admin.create') }}">Create user</a>

<h3>All users</h3>

@foreach ($users as $u)
    <p>
        {{ json_encode($u, JSON_PRETTY_PRINT) }}
        <a href="{{ route('admin.detail', ['id' => $u->id]) }}">Detail</a>
        <a href="{{ route('admin.delete', ['id' => $u->id]) }}">Delete</a>
    </p>
@endforeach
@endsection
