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

    <h1>Noted.</h1>

    <section class="">
        <div class="container-fluid px-0">
            <div class="row g-0">

                <!-- First column -->
                <div class="col-lg-6 vh-100">

                </div>
                <!-- First column -->

                <!-- Second column -->
                <div class="col-lg-6 vh-100">
                    {{-- Bagian Finance --}}
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Finance</h1>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                Saldo
                            </div>
                            <div class="card-body">
                                <p class="text-decoration-none">{{ number_format($saldo, 2, ',', '.') }}</p>
                                <a href="/transactions" class="btn btn-primary">Transactions</a>
                                <a href="/moneybox" class="btn btn-primary">MoneyBox</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <h1 class="h2">Notes</h1>
                            <label for="exampleFormControlTextarea1">Type your notes here</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </main>
                    {{-- Bagian Finance --}}
                </div>
                <!-- Second column -->

            </div>
        </div>
    </section>

@endsection
