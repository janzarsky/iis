<html>
    <body>
        <h1>IIS</h1>
        <h2>Users</h2>

        <a href="{{ route('admin.create') }}">Create user</a>

        <h3>All users</h3>
        
        @foreach ($users as $u)
            <p>
                {{ json_encode($u, JSON_PRETTY_PRINT) }}
                <a href="{{ route('admin.detail', ['id' => $u->id]) }}">Detail</a>
                <a href="{{ route('admin.delete', ['id' => $u->id]) }}">Delete</a>
            </p>
        @endforeach
    </body>
</html>
