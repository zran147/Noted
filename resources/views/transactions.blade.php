@extends('layouts.main')
@include('partials.navbar')

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Section: Split screen -->
<section class="">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <!-- First column -->
            <div class="col-lg-6 vh-100">
                <!-- Nanti masukin grafik nya disini -->
            </div>
            <!-- First column -->

            <!-- Second column -->
            <div class="col-lg-6 vh-100 order-lg-last">
                <a href="{{ route('pemasukan.create') }}" class="btn btn-primary">New Pemasukan</a>
            </div>
            <!-- Second column -->
        </div>
    </div>
</section>
<!-- Section: Split screen -->
