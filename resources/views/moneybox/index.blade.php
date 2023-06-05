@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('before')
    @include('partials.navbar', ['title' => 'MoneyBox'])
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

    <!-- Include the Google Chart API library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            @foreach ($moneyboxes as $moneybox)
                drawChart({{ $moneybox->id }}, {{ $moneybox->nominal_moneybox }}, {{ $moneybox->target_moneybox }});
            @endforeach
        }

        function drawChart(moneyboxId, currentAmount, targetAmount) {
            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Current', currentAmount],
                ['Remaining', targetAmount - currentAmount]
            ]);

            var options = {
                pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'black',
                },
                slices: {
                    0: { color: '#FFA559' },
                    1: { color: '#454545' }
                },
                legend: 'none',
                backgroundColor: 'none',
                chartArea: {
                    top: 20,
                    bottom: 20,
                    width: '100%',
                    height: '100%'
                },
                fontSize: 12
            };

            var chart = new google.visualization.PieChart(document.getElementById('moneyboxChart' + moneyboxId));
            chart.draw(data, options);
        }
    </script>
@endsection

@section('container')
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="row mb-5">
                @foreach ($moneyboxes as $moneybox)
                    <div id="moneyboxChart{{ $moneybox->id }}" class="col-6"></div>
                @endforeach
            </div>
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
                            <div class="col-6 text-end">{{ number_format($moneybox->target_moneybox, 2, ',', '.') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">{{ number_format($moneybox->nominal_moneybox, 2, ',', '.') }}</div>
                            <div class="col-6 text-end">{{ $moneybox->updated_at->format('j F') }}</div>
                        </div>
                        @php
                            $remainingDays = \Carbon\Carbon::parse($moneybox->tanggal_selesai)->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <div class="row mb-3">
                            <div class="col-6">{{ $remainingDays }} days left</div>
                        </div>
                        <div class="progress mb-3" role="progressbar" aria-label="Basic example"
                             aria-valuenow="{{ $moneybox->nominal_moneybox }}" aria-valuemin="0"
                             aria-valuemax="{{ $moneybox->target_moneybox }}" style="height: 20px">
                            <div class="progress-bar"
                                 style="width: {{ ($moneybox->nominal_moneybox / $moneybox->target_moneybox) * 100 }}%; background-color: #FFA559"></div>
                        </div>
                        <a class="mb-3 btn btn-info" style="display: none">Add Money</a>
                        <div class="row mb-2 mt-3 hidden">
                            <div class="col-6">Additional Amount</div>
                        </div>
                        <form class="hidden" action="{{ route('moneybox.saveMoney', $moneybox->id) }}" method="POST">
                            @csrf
                            <input type="number" name="additionalAmount" id="additionalAmount" class="form-control mb-3" required>
                            <button type="submit" class="btn btn-primary mb-3">Add Money</button>
                        </form>
                    </div>
                @endforeach
                <a href="{{ route('moneybox.create') }}" class="btn">New MoneyBox</a>
            </div>
        </div>
    </div>
@endsection
