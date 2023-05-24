@extends('layouts.main')
@include('partials.navbar')

<div class="container-fluid px-0">
    <div class="row g-0">
        <!-- First column -->
        <div class="col-lg-6 vh-100">
            <form method="post" action="/home/notes">
                @csrf
                <div class="mb-3">
                  <label for="judul_note" class="form-label">Judul Note</label>
                  <input type="text" class="form-control @error('judul_note') is-invalid @enderror" id="judul_note" name="judul_note" required autofocus value="{{ old('judul_note') }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                  </div>
                  <div class="mb-3">
                    <label for="kategori_note" class="form-label">Slug</label>
                    <select class="form-select" name="kategori_id">
                        @foreach ($kategori_notes as $kategori)
                        @if(old('kategori_id') == $kategori->id)
                        <option value="{{$kategori->id }}" selected> {{ $kategori->nama }}</option>
                        @else
                        <option value="{{$kategori->id }}"> {{ $kategori->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="isi_note" class="form-label">Isi Note</label>
                    <input id="isi_note" type="hidden" name="isi_note" value={{ old('isi_note')}}>
                    <trix-editor input="isi_note"></trix-editor>
                  </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>


<script>
    const title = document.querySelector('#judul_note');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/home/notes/checkSlug?judul_note=' + judul_note.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
 
    