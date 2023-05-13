@extends('layouts.main')

@section('container')
<h1 class="mb-3">{{ $note->judul_note }}</h1>

<p>Category: <a href="/categories/{{ $note->kategorinotes->slug }}">{{ $note->kategorinotes->nama }}</a></p>

<h5>{{ $note["excerpt_note"] }}</h4>
<h6>{{ $note["isi_note"] }}</h6> 
<h6>
    <a href="/notes">Back to notes</a>
</h6>

@endsection