<html>
    <body>
        <h1>IIS</h1>
        <h2>Meetings</h2>
        <h3>Invites</h3>
            @foreach ($invites as $m) {
                {{ json_encode($m, JSON_PRETTY_PRINT) }}
                <a href="{{ route('meetings.accept', ['id' => $m->id]) }}">Accept meeting</a>
                </br>
            @endforeach
        <h3>Upcoming</h3>
            @foreach ($upcoming as $m) {
                {{ json_encode($m, JSON_PRETTY_PRINT) }}</br>
            @endforeach
        <h3>Past</h3>
            @foreach ($past as $m) {
                {{ json_encode($m, JSON_PRETTY_PRINT) }}</br>
            @endforeach
    </body>
</html>
