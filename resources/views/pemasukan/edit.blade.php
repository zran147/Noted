@extends('layouts.main')
@include('partials.navbar')

@section('container')
    <h1>Edit Transaction</h1>

    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_pemasukan" class="form-label">Judul Pemasukan</label>
            <input type="text" class="form-control @error('judul_pemasukan') is-invalid @enderror" id="judul_pemasukan" name="judul_pemasukan" required autofocus value="{{ old('judul_pemasukan', $pemasukan->judul_pemasukan) }}">
            @error('judul_pemasukan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" id="slug" name="slug" value="{{ old('slug', $pemasukan->slug) }}">
        </div>

        <div class="mb-3">
            <label for="kategoripemasukan" class="form-label">Category</label>
            <select class="form-select @error('kategoripemasukan') is-invalid @enderror" name="kategoripemasukan" id="kategoripemasukan">
                @foreach ($kategoripemasukans as $kategori)
                    <option value="{{ $kategori->nama }}" @if (old('kategoripemasukan', $pemasukan->kategoripemasukan) == $kategori->nama) selected @endif>{{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategoripemasukan')
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
