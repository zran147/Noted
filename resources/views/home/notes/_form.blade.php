<div class="row mb-4">
  <div class="col-6">
    <div class="fs-4 mb-2">Judul</div>
    <input type="text" class="form-control @error('judul_note') is-invalid @enderror" id="judul_note" name="judul_note" required autofocus value="{{ old('judul_note') }}">
  </div>
  <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
  <div class="col-6">
    <div class="fs-4 mb-2">Kategori</div>
    <select class="form-select" name="kategori_note">
        <option value="">Pilih Kategori</option>
        @foreach ($kategori_notes as $kategori)
            @if (old('kategori_note') == $kategori->id)
                <option value="{{ $kategori->nama }}" selected>{{ $kategori->nama }}</option>
            @else
                <option clevalue="{{ $kategori->nama }}">{{ $kategori->nama }}</option>
            @endif
        @endforeach
    </select>
  </div>
</div>
<div class="mb-3">
  <input id="isi_note" type="hidden" name="isi_note" value={{ old('isi_note')}}>
  <trix-editor input="isi_note"></trix-editor>
</div>

<button type="submit" class="btn btn-primary">{{ isset($note) ? 'Update' : 'Save' }}</button>
