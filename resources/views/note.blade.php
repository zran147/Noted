@extends('layouts.main')

@section('container')
<article>
    <h2>{{ $note["title"] }}</h2>
    <h5>{{ $note["author"] }}</h5>
    <p>{{ $note["body"] }}</p>
</article>

<a href="/notes">Back to notes</a>
@endsection