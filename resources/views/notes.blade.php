@extends('layouts.main')

@section('container')



@foreach($notes as $note)

<article class="mb-5">
    <h2>
        <a href="/notes/{{ $note->id }}">{{ $note->judul_note }}</a>
    </h2>
    <h4>
        <a href=>{{ $note["kategori_note"] }}</a>
    </h4>
    <h5>{{ $note["excerpt_note"] }}</h4>
    <h6>{{ $note["isi_note"] }}</h6> 
</article>

@endforeach

@endsection