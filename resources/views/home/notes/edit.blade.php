@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <div class="row card mt-5 poppins">
        <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-4">
                <div class="col-6">
                    <div class="fs-4 mb-2">Judul</div>
                    <input type="text" class="form-control @error('judul_note') is-invalid @enderror" id="judul_note" name="judul_note" required autofocus value="{{ old('judul_note', $note->judul_note) }}">
                    @error('judul_note')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="fs-4 mb-2">Kategori</div>
                    <select class="form-select @error('kategori_note') is-invalid @enderror" name="kategori_note" id="kategori_note">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori_notes as $kategori)
                            <option value="{{ $kategori->id }}" @if (old('kategori_note', $note->kategori_note) == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                @error('kategori_note')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>     
            <div class="mb-3">
                <input id="isi_note" type="hidden" name="isi_note" value="{{ old('isi_note', $note->isi_note) }}">
                <trix-editor input="isi_note"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
