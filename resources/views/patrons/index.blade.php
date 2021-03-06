@extends('main')

@section('title', 'Patrons')

@section('content')

<p>
<strong>My patron:</strong>
    @if (isset($patron))
        {{ $patron->name }}
        <a href="{{ route('patrons.remove') }}"
            class="btn btn-outline-primary">Remove patron</a>
    @elseif (isset($request))
        {{ $request->name }} (requesting)
        <a href="{{ route('patrons.cancel') }}"
            class="btn btn-outline-primary">Cancel request</a>
    @else
        None
        <a href="{{ route('patrons.request') }}"
            class="btn btn-outline-primary">Request patron</a>
    @endif
</p>

<p>
<strong>My alcoholic:</strong>
    @if (isset($alcoholic))
        {{ $alcoholic->name }}
        <a href="{{ route('patrons.stop') }}"
            class="btn btn-outline-primary">Stop being patron</a>
    @else
        None
    @endif
</p>

@if (isset($patron_requests))
    @foreach ($patron_requests as $r)
        <p>
            {{ $r->name }} (requesting)
            @if (!isset($alcoholic))
                <a href="{{ route('patrons.accept', ['id' => $r->id]) }}"
                    class="btn btn-outline-primary">Accept request</a>
            @endif
            <a href="{{ route('patrons.decline', ['id' => $r->id]) }}"
                class="btn btn-outline-danger">Decline request</a>
        </p>
    @endforeach
@endif

@endsection
