@extends('layouts.main')

@section('container')
<article>
    <h2>{{ $note["judul_note"] }}</h2>
    <h5>{{ $note["excerpt_note"] }}</h5>
    <p>{{ $note["isi_note"] }}</p>
</article>

<a href="/notes">Back to notes</a>
@endsection