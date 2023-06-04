@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <h1>Edit Note</h1>
    <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul_note" class="form-label">Judul Note</label>
            <input type="text" class="form-control @error('judul_note') is-invalid @enderror" id="judul_note" name="judul_note" required autofocus value="{{ old('judul_note', $note->judul_note) }}">
            @error('judul_note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori_note" class="form-label">Category</label>
            <select class="form-select @error('kategori_note') is-invalid @enderror" name="kategori_note" id="kategori_note">
                @foreach ($kategori_notes as $kategori)
                    <option value="{{ $kategori->id }}" @if (old('kategori_note', $note->kategori_note) == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategori_note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>        
        <div class="mb-3">
            <label for="isi_note" class="form-label">Isi Note</label>
            <input id="isi_note" type="hidden" name="isi_note" value="{{ old('isi_note', $note->isi_note) }}">
            <trix-editor input="isi_note"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@section('container')
    <div class="row mt-5">

        <!-- First column -->
        <div class="col-md-6">
            <!-- Render the transactions chart -->
            <div id="homeTransactionsChart" style="width: 100%; height: 300px;"></div>
        </div>
        <!-- /First column -->

        <!-- Second column -->
       
        <!-- /Second column -->

    </div>

@endsection
