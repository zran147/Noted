@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <h1>Edit Note</h1>

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="judul_note" class="form-label">Title</label>
            <input type="text" class="form-control" id="judul_note" name="judul_note" value="{{ $note->judul_note }}" required>
        </div>
        
        <div class="mb-3">
            <label for="kategori_note" class="form-label">Category</label>
            <input type="text" class="form-control" id="kategori_note" name="kategori_note" value="{{ $note->kategori_note }}">
        </div>
        
        <div class="mb-3">
            <label for="isi_note" class="form-label">Content</label>
            <textarea class="form-control" id="isi_note" name="isi_note" rows="5" required>{{ $note->isi_note }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
