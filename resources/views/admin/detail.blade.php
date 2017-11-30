@extends('main')

@section('title', 'User detail')

@section('content')

<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong>
@if ($user->is_alcoholic)
    Alcoholic
@elseif ($user->is_specialist)
    Specialist
@elseif ($user->is_admin)
    Admin
@else
    None
@endif
</p>
<p><strong>Is patron?:</strong>
@if ($user->is_patron)
    Yes
@else
    No
@endif
</p>
@if ($user->specialist_id)
<p>
<strong>Specialist:</strong> {{ $user->specialist_name }}
<a href="{{ route('admin.detail', ['id' => $user->specialist_id]) }}">Detail</a>
</p>
@endif

<p><strong>Created:</strong> {{ $user->created_at }}</p>
<p><strong>Updated:</strong> {{ $user->created_at }}</p>

<p>
    <a href="{{ route('admin.edit', ['id' => $user->id]) }}"
        class="btn btn-outline-primary">Edit</a>
    <a href="{{ route('admin.delete', ['id' => $user->id]) }}"
        class="btn btn-outline-danger">Delete</a>
</p>
@endsection
