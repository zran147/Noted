@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <h1 class="mb-3">{{ $note->judul_note }}</h1>
    <h4>
        @if ($note->kategori_note)
            <a href="/categories/{{ $note->kategori_note }}" class="text-decoration-none">{{ $note->kategori_note }}</a>
        @else
            No Category Assigned
        @endif
    </h4>
    <h6>{!! $note["isi_note"] !!}</h6>
    <h6>
        <a href="/notes">Back to notes</a>
    </h6>
@endsection
