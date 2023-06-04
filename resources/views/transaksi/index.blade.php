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

    <!-- Include the Google Chart API library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var transaksis = {!! $transaksis !!};
            var pemasukan = 0;
            var pengeluaran = 0;

            // Calculate pemasukan and pengeluaran
            transaksis.forEach(function(transaksi) {
                if (transaksi.jenis_transaksi === 'pemasukan') {
                    pemasukan += parseFloat(transaksi.nominal_transaksi);
                } else if (transaksi.jenis_transaksi === 'pengeluaran') {
                    pengeluaran += parseFloat(transaksi.nominal_transaksi);
                }
            });

            var data = google.visualization.arrayToDataTable([
                ['Jenis Transaksi', 'Amount'],
                ['Pemasukan', pemasukan],
                ['Pengeluaran', pengeluaran]
            ]);

            var options = {
                // Remove the title
                title: '',

                // Remove the labels
                legend: 'none',

                // Customize the colors
                colors: ['#FFA559', '#454545'],

                // Remove the background color
                backgroundColor: 'none',

                // Adjust chart area padding
                chartArea: {
                    left: 20,
                    top: 20,
                    width: '100%',
                    height: '100%'
                },

                // Adjust the font size
                fontSize: 12,

                // Set the pieHole to create a donut chart
                pieHole: 0.4
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('transactionsChart'));
            pieChart.draw(data, options);

            var columnData = google.visualization.arrayToDataTable([
                ['Kategori Transaksi', 'Pemasukan', 'Pengeluaran', { role: 'annotation' } ],
                @foreach ($kategoriData as $kategori)
                ['{{ $kategori->nama }}', {{ $kategori->pemasukan }}, {{ $kategori->pengeluaran }}, ''],
                @endforeach
            ]);

            var columnOptions = {
                width: '70%',
                height: 400,
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '75%' },
                isStacked: true,
                colors: ['#FFA559', '#454545'],
            };

            var columnChart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            columnChart.draw(columnData, columnOptions);
        }
    </script>

    <style>
        /* Remove background color */
        #transactionsChart,
        #chart_div {
            background-color: transparent !important;
        }
    </style>
@endsection

@section('container')
    <div class="row mt-5">
        <div class="col-6">
            <!-- Render the transactions chart -->
            <div id="transactionsChart" style="width: 100%; height: 300px;"></div>
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
                        <div class="row mb-1 mt-2">
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

    <!-- Add a new div for the column chart -->
    <div class="row mt-5">
        <div class="col-6">
            <div id="chart_div" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
@endsection
