<div class="mb-3">
  <label for="judul_transaksi" class="form-label">Judul Transaksi</label>
  <input type="text" class="form-control @error('judul_transaksi') is-invalid @enderror" id="judul_transaksi" name="judul_transaksi" required autofocus value="{{ old('judul_transaksi') }}">
</div>

<div class="mb-3">
  <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
</div>

<div class="mb-3">
  <label for="kategoritransaksi" class="form-label">Category</label>
  <select class="form-select" name="kategoritransaksi">
    @foreach ($kategoritransaksis as $kategori)
      @if (old('kategoritransaksi') == $kategori->id)
        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
      @else
        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
      @endif
    @endforeach
  </select>
</div>

<select class="form-select" name="jenis_transaksi">
  <option selected>Jenis transaksi</option>
  <option value="pemasukan">Pemasukan</option>
  <option value="pengeluaran">Pengeluaran</option>
</select>
@error('jenis_transaksi')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="input-group mb-3">
  <span class="input-group-text">Rp</span>
  <input type="number" class="form-control" name="nominal_transaksi" required autofocus>
  <span class="input-group-text">,00</span>
</div>

<button type="submit" class="btn btn-primary">{{ isset($transaksi) ? 'Update' : 'Save' }}</button>
