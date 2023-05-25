@extends('layouts.main')
@include('partials.navbar')

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
<!-- Search Bar -->

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<!-- Section: Split screen -->
<section class="">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <!-- First column -->
            <div class="col-lg-6 vh-100">
                <div class="form-group">
                    <h1 class="h2">Notes</h1>
                    <label for="exampleFormControlTextarea1">Type your notes here</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <!-- First column -->
            
            <!-- Second column -->
            <div class="col-lg-6 vh-100">
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Create Note</a>

                @foreach($notes as $note)
                    <div href="/notes/{{ $note->slug }}" class="card" style="width: 18rem;">
                        <h2>
                            <a href="/notes/{{ $note->slug }}" class="text-decoration-none">{{ $note->judul_note }}</a>
                        </h2>
                        <h4>
                            @if ($note->kategori_note)
                                <a href="/categories/{{ $note->kategori_note }}" class="text-decoration-none">{{ $note->kategori_note }}</a>
                            @else
                                No Category Assigned
                            @endif
                        </h4>
                        
                    </div>
                    
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    
                    
                @endforeach
            </div>
            <!-- Second column -->
        </div>
    </div>
</section>
<!-- Section: Split screen -->
