@extends('layouts.main')
@include('partials.navbar')

<!-- Search Bar -->
<!-- <div class="row justify-content-center my-3">
    <div class="col-md-6">
        <form action="{{ route('notes.index') }}">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search notes" name="search" value="{{ request('search')}}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div> -->
<!-- Search Bar -->

<!-- @if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif -->
<h1 class="h2 ml-3 mt-3">Title</h1>
<div class="row m-1">
        <!-- bagian kiri -->
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card bg-dark">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- bagian kanan -->
        <div class="col-sm-6 ms-auto">
            <div class="card bg-dark">
                <div class="card-body">
                    
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
                        <div>
                            <p>{{ $note->updated_at->format('j F') }}</p>
                        </div>
                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
                        
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    @endforeach
                    <div class="card mb-0">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                    <a href="{{ route('notes.create') }}" class="btn btn-primary mt-3 mb-0">Create Note</a>
            </div>
        </div>
    </div>
</div>