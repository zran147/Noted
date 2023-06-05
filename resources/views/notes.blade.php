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
@section('container')
    <div class="row mt-5">
        <!-- First column -->
        <div class="col-6">
            <div class="card">
                <div class="form-group mb-0">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
            </div>
        </div>
        <!-- /First column -->

        <!-- Second column -->
        <div class="col-6">
            <div class="card">
                @foreach($notes as $note)
                <div class="white-bar">
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hidden fa-solid fa-xmark"></button>
                    </form>
                    <div class="row mb-1 mt-2">
                        <div class="col-6">
                            <div class="col">{{ $note->judul_note }}</div>
                            @if ($note->kategori->nama)
                                <div class="col">{{ $note->kategori->nama }}</div>
                            @else
                                <div class="col">No Category Assigned</div>
                            @endif
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            {{ $note->updated_at->format('j F') }}
                        </div>
                    </div>
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
                </div>
                @endforeach
                <!-- <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div> -->
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Create Note</a>
            </div>
        </div>
        <!-- /Second column -->
    </div>
@endsection
