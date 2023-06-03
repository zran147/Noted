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

<h1>Transactions</h1>

<div class="row g-0">
    <div class="col-lg-6 vh-100">
        <!-- Add your chart/graph component here -->
    </div>

    <div class="col-lg-6 vh-100 order-lg-last">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">New transaksi</a>

        @foreach ($transaksis as $transaksi)
        <div href="/transactions/{{ $transaksi->slug }}" class="card" style="width: 18rem;">
            <h2>
                <a class="text-decoration-none">{{ $transaksi->judul_transaksi }}</a>
            </h2>
            <h2>
                <a class="text-decoration-none {{ $transaksi->jenis_transaksi === 'pemasukan' ? 'text-success' : 'text-danger' }}">
                    {{ number_format($transaksi->nominal_transaksi, 2, ',', '.') }}
                </a>
            </h2>
            <h4>
                @if ($transaksi->kategoritransaksi)
                <span class="text-decoration-none">{{ $transaksi->kategoritransaksi->nama }}</span>
                @else
                No Category Assigned
                @endif
            </h4>

            <div>
                <p>{{ $transaksi->updated_at->format('j F') }}</p>
            </div>
            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection

