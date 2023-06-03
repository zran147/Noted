@php
    use Carbon\Carbon;
@endphp

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


<h1>MoneyBox</h1>

<div class="row g-0">
    <div class="col-lg-6 vh-100">
        <!-- Add your chart/graph component here -->
    </div>

    <div class="col-lg-6 vh-100 order-lg-last">
        <a href="{{ route('moneybox.create') }}" class="btn btn-primary">New MoneyBox</a>

        @foreach ($moneyboxes as $moneybox)
        <div href="/moneybox/{{ $moneybox->slug }}" class="card" style="width: 18rem;">
            <h2>
                <a class="text-decoration-none">{{ $moneybox->judul_moneybox }}</a>
            </h2>
            <h2>
                <a class="text-decoration-none"> {{ number_format($moneybox->target_moneybox, 2, ',', '.')  }}</a>
            </h2>
            <h2>
                <a class="text-decoration-none"> {{ number_format($moneybox->nominal_moneybox, 2, ',', '.') }} </a>
            </h2>
            <div>
                <p>{{ $moneybox->updated_at->format('j F') }}</p>
            </div>
            @php
            $remainingDays = \Carbon\Carbon::parse($moneybox->tanggal_selesai)->diffInDays(\Carbon\Carbon::now());
            @endphp
            <p>{{ $remainingDays }} days left</p>
            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $moneybox->nominal_moneybox }}" aria-valuemin="0" aria-valuemax="{{ $moneybox->target_moneybox }}">
                <div class="progress-bar" style="width: {{ ($moneybox->nominal_moneybox / $moneybox->target_moneybox) * 100 }}%"></div>
            </div>
            <a href="{{ route('moneybox.addmoney', $moneybox->id) }}" class="btn btn-info">Add Money</a>
            <form action="{{ route('moneybox.destroy', $moneybox->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection

