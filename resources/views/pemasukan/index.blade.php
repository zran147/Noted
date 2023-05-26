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
            <a href="{{ route('pemasukan.create') }}" class="btn btn-primary">New Pemasukan</a>

            @foreach ($pemasukans as $pemasukan)
                <div href="/transactions/{{ $pemasukan->slug }}" class="card" style="width: 18rem;">
                    <h2>
                        <a href="/transactions/{{ $pemasukan->slug }}" class="text-decoration-none">{{ $pemasukan->judul_pemasukan }}</a>
                    </h2>
                    <h2>
                        <a class="text-decoration-none">{{ number_format($pemasukan->pemasukan_nominal, 2, ',', '.') }}</a>
                    </h2>
                    <h4>
                        @if ($pemasukan->kategoripemasukan)
                            <a href="/categories/{{ $pemasukan->kategoripemasukan }}" class="text-decoration-none">{{ $pemasukan->kategoripemasukan }}</a>
                        @else
                            No Category Assigned
                        @endif
                    </h4>
                    <div>
                        <p>{{ $pemasukan->updated_at->format('j F') }}</p>
                    </div>
                    <a href="{{ route('transactions.edit', $pemasukan->id) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

