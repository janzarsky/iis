<html>
    <body>
        <h1>IIS</h1>
        <h2>Meeting detail</h2>

        <p>
        {{ json_encode($meeting, JSON_PRETTY_PRINT) }}
        </p>

        <a href="{{ route('meetings') }}">Back to all meetings</a>
    </body>
</html>
