<div class="mb-3">
  <label for="judul_pemasukan" class="form-label">Judul Pemasukan</label>
  <input type="text" class="form-control @error('judul_pemasukan') is-invalid @enderror" id="judul_pemasukan" name="judul_pemasukan" required autofocus value="{{ old('judul_pemasukan') }}">
</div>

<div class="mb-3">
  <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
</div>

<div class="mb-3">
  <label for="kategoripemasukan" class="form-label">Category</label>
  <select class="form-select" name="kategoripemasukan">
    @foreach ($kategoripemasukans as $kategori)
      @if (old('kategoripemasukan') == $kategori->id)
        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
      @else
        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
      @endif
    @endforeach
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Rp</span>
  <input type="number" class="form-control" name="pemasukan_nominal">
  <span class="input-group-text">,00</span>
</div>

<button type="submit" class="btn btn-primary">{{ isset($pemasukan) ? 'Update' : 'Save' }}</button>
