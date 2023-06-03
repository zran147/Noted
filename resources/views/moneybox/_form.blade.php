<div class="mb-3">
    <label for="judul_moneybox" class="form-label">Judul MoneyBox</label>
    <input type="text" class="form-control @error('judul_moneybox') is-invalid @enderror" id="judul_moneybox" name="judul_moneybox" required value="{{ old('judul_moneybox') }}">
  </div>
  
  <div class="mb-3">
    <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
  </div>

  <div class="input-group mb-3">
    <label for="target_moneybox" class="form-label">Target MoneyBox</label>
    <span class="input-group-text">Rp</span>
    <input type="number" class="form-control" name="target_moneybox" required value="{{ old('target_moneybox') }}">
    <span class="input-group-text">,00</span>
  </div>
  
  <div class="input-group mb-3">
    <label for="nominal_moneybox" class="form-label">Isi Sementara MoneyBox</label>
    <span class="input-group-text">Rp</span>
    <input type="number" class="form-control" name="nominal_moneybox" required value="{{ old('nominal_moneybox') }}">
    <span class="input-group-text">,00</span>
  </div>

  <div class="col-md-6">
    <label for="tanggal_selesai" class="form-label">Batas Akhir Moneybox</label>
    <input type="datetime-local" class="form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]", {
        dateFormat: "Y-m-d",
        enableTime: false
    });
</script>
@endpush


<button type="submit" class="btn btn-primary">{{ isset($moneybox) ? 'Update' : 'Save' }}</button>
  