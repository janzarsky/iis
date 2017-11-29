<html>
    <body>
        <h1>IIS</h1>
        <h2>Create meeting</h2>

        {{ Form::open(['url' => 'meetings/create']) }}

        <p>
            {{ Form::label('location', 'Location') }}
            {{ Form::text('location') }}
        </p>

        <p>
            {{ Form::label('date', 'Date') }}
            {{ Form::text('date') }}
        </p>

        <p>
            {{ Form::submit('Submit!') }}
        </p>

        {{ Form::close() }}
    </body>
</html>
