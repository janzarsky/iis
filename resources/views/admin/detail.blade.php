<html>
    <body>
        <h1>IIS</h1>
        <h2>User detail</h2>

        <p>
        {{ json_encode($user, JSON_PRETTY_PRINT) }}
        </p>

        <a href="{{ route('admin') }}">Back to all users</a>
    </body>
</html>
