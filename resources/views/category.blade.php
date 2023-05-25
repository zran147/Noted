@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <article>
        <h1 class="mb-3">Note Category: {{ $kategorinotes }}</h1>
    </article>

    <h6>
        <a href="/notes">Back to notes</a>
    </h6>

    @foreach($notes as $note)
        <article class="mb-5">
            <h4>
                @if ($note->kategori_note)
                    <a href="/categories/{{ $note->kategori_note }}" class="text-decoration-none">{{ $note->kategori_note }}</a>
                @else
                    No Category Assigned
                @endif
            </h4>
            <h2>
                <a href="/notes/{{ $note->slug }}">{{ $note->judul_note }}</a>
            </h2>
        </article>
    @endforeach
@endsection
