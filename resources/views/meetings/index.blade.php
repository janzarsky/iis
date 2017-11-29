<html>
    <body>
        <h1>IIS</h1>
        <h2>Meetings</h2>
        <h3>Invites</h3>
        {{ json_encode($invites, JSON_PRETTY_PRINT) }}
        <h3>Upcoming</h3>
        {{ json_encode($upcoming, JSON_PRETTY_PRINT) }}
        <h3>Past</h3>
        {{ json_encode($past, JSON_PRETTY_PRINT) }}
    </body>
</html>
