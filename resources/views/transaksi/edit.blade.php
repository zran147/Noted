@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <h1>Edit Transaction</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_transaksi" class="form-label">Judul transaksi</label>
            <input type="text" class="form-control @error('judul_transaksi') is-invalid @enderror" id="judul_transaksi" name="judul_transaksi" required autofocus value="{{ old('judul_transaksi', $transaksi->judul_transaksi) }}">
            @error('judul_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" id="slug" name="slug" value="{{ old('slug', $transaksi->slug) }}">
        </div>

        <div class="mb-3">
            <label for="kategoritransaksi" class="form-label">Category</label>
            <select class="form-select @error('kategoritransaksi') is-invalid @enderror" name="kategoritransaksi" id="kategoritransaksi">
                @foreach ($kategoritransaksis as $kategori)
                    <option value="{{ $kategori->nama }}" @if (old('kategoritransaksi', $transaksi->kategoritransaksi) == $kategori->nama) selected @endif>{{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategoritransaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control">
            <span class="input-group-text">,00</span>
          </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
