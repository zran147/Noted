@extends('layouts.main')

@section('container')
<h1 class="mb-3">{{ $note->judul_note }}</h1>

    {!! $note->isi_note !!}
<h6>
    <a href="/notes">Back to notes</a>
</h6>

@endsection