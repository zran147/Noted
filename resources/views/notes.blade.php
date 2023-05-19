@extends('layouts.main')
@include('partials.navbar')

@section('container')

    <!-- Search Bar -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/notes">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search notes" name="search" value="{{ request('search')}}">
                <button class="btn btn-danger" type="submit">Search</button>
              </div> 
        </form>
    </div>
</div>


@foreach($notes as $note)

<article class="mb-5">
    <h2>
        <a href="/notes/{{ $note->slug }}" class="text-decoration-none">{{ $note->judul_note }}</a>
    </h2>
    <h4>
        <a href="/categories/{{ $note->kategorinotes->slug }}" class="text-decoration-none" >{{ $note->kategorinotes->nama }}</a>
    </h4>
    <h5>{{ $note["excerpt_note"] }}</h4>
    <h6>{{ $note["isi_note"] }}</h6> 
</article>

@endforeach
 
@endsection