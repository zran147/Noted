@extends('layouts.main')

@section('before')
@include('partials.navbar', ['title' => 'Home'])
@endsection

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
</div>
@endif

    <div class="row mt-5">
        <div class="col-6">
            <!-- Add your chart/graph component here -->
        </div>

        <div class="col-6">
            <div class="card poppins text-capitalize">
                @foreach ($transaksis as $transaksi)
                    <div class="white-bar">
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger hidden fa-solid fa-xmark"></button>
                        </form>
                        <div class="row mb-2">
                            <div class="col-6">{{ $transaksi->judul_transaksi }}</div>
                            <div class="col-6 text-end {{ $transaksi->jenis_transaksi === 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                {{ number_format($transaksi->nominal_transaksi, 2, ',', '.') }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                @if ($transaksi->kategoritransaksi)
                                    {{ $transaksi->kategoritransaksi->nama }}
                                @else
                                    No Category Assigned
                                @endif
                            </div>
                            <div class="col-6 text-end">{{ $transaksi->updated_at->format('j F') }}</div>
                        </div>
                        {{-- <a href="{{ route('transactions.edit', $transaksi->id) }}" class="btn btn-primary">Edit</a> --}}
                    </div>
                @endforeach
                <a href="{{ route('transaksi.create') }}" class="btn">Transaksi Baru</a>
            </div>
        </div>
    </div>
@endsection

