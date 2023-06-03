<input type="text" class=" white-bar mb-3 form-control @error('judul_moneybox') is-invalid @enderror" id="judul_moneybox" name="judul_moneybox" placeholder="Judul" required value="{{ old('judul_moneybox') }}">

<input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>

<div class="input-group mb-3">
  <span class="input-group-text" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px">Rp</span>
  <input type="number" class="form-control" name="target_moneybox" style="height: 10vh; border-top-right-radius: 12px; border-bottom-right-radius: 12px" placeholder="Target" required value="{{ old('target_moneybox') }}">
</div>
  
<div class="input-group mb-3">
  <span class="input-group-text" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px">Rp</span>
  <input type="number" class="form-control" name="nominal_moneybox" style="height: 10vh; border-top-right-radius: 12px; border-bottom-right-radius: 12px" placeholder="Tabungan Awal" required value="{{ old('nominal_moneybox') }}">
</div>

<input type="datetime-local" class="white-bar mb-4 form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" placeholder="Deadline" required>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("input[type=datetime-local]", {
      dateFormat: "Y-m-d",
      enableTime: false
  });
</script>
@endpush

<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary" style="width: 160px">{{ isset($moneybox) ? 'Update' : 'Save' }}</button>
</div>
