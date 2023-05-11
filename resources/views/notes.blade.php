@extends('layouts.main')

@section('container')



@foreach($notes as $note)

<article class="mb-5">
    <h2>
        <a href="/notes/{{ $note["slug"] }}">{{ $note["judul"] }}</a>
    </h2>
    <h5>{{ $note["isi_note"] }}</h5> 
</article>

@endforeach

@endsection