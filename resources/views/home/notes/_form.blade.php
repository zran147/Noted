<div class="mb-3">
    <label for="judul_note" class="form-label">Judul Note</label>
    <input type="text" class="form-control @error('judul_note') is-invalid @enderror" id="judul_note" name="judul_note" required autofocus value="{{ old('judul_note') }}">
  </div>
  
  <div class="mb-3">
      <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
    </div>

    <div class="mb-3">
      <label for="kategori_note" class="form-label">Category</label>
      <select class="form-select" name="kategori_note">
          @foreach ($kategori_notes as $kategori)
              @if (old('kategori_note') == $kategori->id)
                  <option value="{{ $kategori->nama }}" selected>{{ $kategori->nama }}</option>
              @else
                  <option clevalue="{{ $kategori->nama }}">{{ $kategori->nama }}</option>
              @endif
          @endforeach
      </select>
  </div>
  
  
    <div class="mb-3">
      <label for="isi_note" class="form-label">Isi Note</label>
      <input id="isi_note" type="hidden" name="isi_note" value={{ old('isi_note')}}>
      <trix-editor input="isi_note"></trix-editor>
    </div>

<button type="submit" class="btn btn-primary">{{ isset($note) ? 'Update' : 'Save' }}</button>
