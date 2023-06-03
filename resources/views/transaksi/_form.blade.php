<select class="form-select mb-3" name="jenis_transaksi">
  <option value="pemasukan">Pemasukan</option>
  <option value="pengeluaran">Pengeluaran</option>
</select>

<select class="mb-3 white-bar form-select @error('kategoritransaksi_id') is-invalid @enderror" name="kategoritransaksi_id" id="kategoritransaksi_id" style="height: 10vh">
  <option value="">Pilih Kategori</option>
  @foreach ($kategoritransaksis as $kategori)
    @if (old('kategoritransaksi') == $kategori->id)
      <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
    @else
      <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
    @endif
  @endforeach
</select>

<div class="input-group mb-3">
  <span class="input-group-text" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px">Rp</span>
  <input type="number" class="form-control" name="nominal_transaksi" style="height: 10vh; border-top-right-radius: 12px; border-bottom-right-radius: 12px" placeholder="Nominal" required autofocus>
</div>

<input type="text" class="white-bar mb-3 form-control @error('judul_transaksi') is-invalid @enderror" id="judul_transaksi" name="judul_transaksi" style="height: 10vh" placeholder="Deskripsi" required value="{{ old('judul_transaksi') }}">

<div class="mb-3">
  <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
</div>

@error('jenis_transaksi')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">{{ isset($transaksi) ? 'Update' : 'Save' }}</button>
