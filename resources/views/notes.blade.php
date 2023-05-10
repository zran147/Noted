@extends('layouts.main')

@section('container')



@foreach($notes as $note)

<article class="mb-5">
    <h2>
        <a href="/notes/{{ $note["slug"] }}">{{ $note["title"] }}</a>
    </h2>
    <h5>By: {{ $note["author"] }}</h5>
    <h5>{{ $note["body"] }}</h5> 
</article>

@endforeach

@endsection