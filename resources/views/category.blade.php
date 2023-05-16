@extends('layouts.main')

@section('container')
<article>
    <h1 class="mb-3">Note Category : {{ $kategorinotes }}</h1>
</article>


<h6>
    <a href="/notes">Back to notes</a>
</h6>
@foreach($notes as $note)
<article class="mb-5">
    <h2>
        <a href="/notes/{{ $note->slug }}">{{ $note->judul_note }}</a>
    </h2>
    <h4>
        <a href="/categories/{{ $note->kategorinotes->slug }}">{{ $note->kategorinotes->nama }}</a>
    </h4>
    <h5>{{ $note["excerpt_note"] }}</h4>
    <h6>{{ $note["isi_note"] }}</h6> 
</article>
@endforeach


 
@endsection
