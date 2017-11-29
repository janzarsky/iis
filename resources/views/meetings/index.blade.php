<html>
    <body>
        <h1>IIS</h1>
        <h2>Meetings</h2>

        <a href="{{ route('meetings.create') }}">Create meeting</a>
        
        <h3>Invites</h3>
            @foreach ($invites as $m)
                <p>
                    {{ json_encode($m, JSON_PRETTY_PRINT) }}
                    <a href="{{ route('meetings.accept', ['id' => $m->id]) }}">Accept meeting</a>
                    <a href="{{ route('meetings.detail', ['id' => $m->id]) }}">Detail</a>
                    <a href="{{ route('meetings.delete', ['id' => $m->id]) }}">Delete</a>
                </p>
            @endforeach
        <h3>Upcoming</h3>
            @foreach ($upcoming as $m)
                <p>
                    {{ json_encode($m, JSON_PRETTY_PRINT) }}
                    <a href="{{ route('meetings.detail', ['id' => $m->id]) }}">Detail</a>
                    <a href="{{ route('meetings.delete', ['id' => $m->id]) }}">Delete</a>
                </p>
            @endforeach
        <h3>Past</h3>
            @foreach ($past as $m)
                <p>
                    {{ json_encode($m, JSON_PRETTY_PRINT) }}
                    <a href="{{ route('meetings.detail', ['id' => $m->id]) }}">Detail</a>
                    <a href="{{ route('meetings.delete', ['id' => $m->id]) }}">Delete</a>
                </p>
            @endforeach
    </body>
</html>
