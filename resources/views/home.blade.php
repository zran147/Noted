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

        <!-- First column -->
        <div class="col-md-6">
        </div>
        <!-- /First column -->

        <!-- Second column -->
        <div class="col-md-6 px-3">
            {{-- Bagian Finance --}}
            <h2 class="poppins brown">Finance</h2>

            <div class="card mb-4">
                <h4>Saldo</h4>
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex align-items-center">
                        <h3 class="text-decoration-none">Rp {{ number_format($saldo, 2, ',', '.') }}</h3>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center">
                        <a href="/transactions" class="btn">Transactions</a>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center">
                        <a href="/moneybox" class="btn">MoneyBox</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h2 class="poppins brown">Notes</h2>
                <!-- <label for="exampleFormControlTextarea1">Type your notes here</label> -->
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            {{-- Bagian Finance --}}
        </div>
        <!-- /Second column -->

    </div>

@endsection
