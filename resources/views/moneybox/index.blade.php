@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('before')
    @include('partials.navbar', ['title' => 'Home'])
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
@endsection

@section('container')
    <div class="row mt-5">
        <div class="col-lg-6">
            <!-- Add your chart/graph component here -->
        </div>

        <div class="col-lg-6">
            <div class="card poppins text-capitalize">
                @foreach ($moneyboxes as $moneybox)
                    <div class="white-bar">
                        <form action="{{ route('moneybox.destroy', $moneybox->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger hidden fa-solid fa-xmark"></button>
                        </form>
                        <div class="row mb-2 mt-3">
                            <div class="col-6">{{ $moneybox->judul_moneybox }}</div>
                            <div class="col-6 text-end"> {{ number_format($moneybox->target_moneybox, 2, ',', '.')  }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"> {{ number_format($moneybox->nominal_moneybox, 2, ',', '.') }} </div>
                            <div class="col-6 text-end">{{ $moneybox->updated_at->format('j F') }}</div>
                        </div>
                        @php
                        $remainingDays = \Carbon\Carbon::parse($moneybox->tanggal_selesai)->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <div class="row mb-2">
                            <div class="col-6">{{ $remainingDays }} days left</div>
                        </div>
                        <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $moneybox->nominal_moneybox }}" aria-valuemin="0" aria-valuemax="{{ $moneybox->target_moneybox }}">
                            <div class="progress-bar" style="width: {{ ($moneybox->nominal_moneybox / $moneybox->target_moneybox) * 100 }}%"></div>
                        </div>
                        <a href="{{ route('moneybox.addmoney', $moneybox->id) }}" class="mb-3 btn btn-info">Add Money</a>
                    </div>
                @endforeach
                <a href="{{ route('moneybox.create') }}" class="btn">New MoneyBox</a>
            </div>
        </div>
    </div>
@endsection

