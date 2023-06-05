@extends('layouts.main')
@include('partials.navbar', ['title' => 'Home'])

@section('before')
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
                    top: 20,
                    bottom: 20,
                    width: '100%',
                    height: '100%'
                },

                // Adjust the font size
                fontSize: 12,

                // Set the pieHole to create a donut chart
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('homeDonutChart'));
            chart.draw(data, options);
        }
    </script>

    <!-- Additional column chart -->
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawColumnChart);
    
        function drawColumnChart() {
            var kategoriData = {!! $kategoriData !!};
    
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Pemasukan');
            data.addColumn('number', 'Pengeluaran');
    
            kategoriData.forEach(function(kategori) {
                data.addRow([kategori.nama, parseFloat(kategori.pemasukan), parseFloat(kategori.pengeluaran)]);
            });
    
            var options = {
                legend: { position: 'none' },
                backgroundColor: 'none',
                chartArea: {
                    top: 20,
                    bottom: 20,
                    width: '80%',
                    height: '80%'
                },
                fontSize: 12,
                colors: ['#FFA559', '#454545'],
                isStacked: true, // Set to true for stacked column chart
            };
    
            var chart = new google.visualization.ColumnChart(document.getElementById('homeBarChart'));
            chart.draw(data, options);
        }
    </script>
@endsection

@section('container')
    <div class="row mt-5">

        <!-- First column -->
        <div class="col-md-6">
            <!-- Render the transactions chart -->
            <div id="homeDonutChart" class="row"></div>
            <div id="homeBarChart" class="row"></div>
        </div>
        <!-- /First column -->

        <!-- Second column -->
        <div class="col-md-6 px-3">
            {{-- Bagian Finance --}}
            <h2 class="poppins brown">Finance</h2>

            <div class="card mb-4" style="height: auto; border: none; padding: 1.5rem;">
                <h4>Saldo</h4>
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex align-items-center mb-3 mb-lg-0">
                        <h3 class="text-decoration-none">Rp {{ number_format($saldo, 2, ',', '.') }}</h3>
                    </div>
                    <div class="col-4 col-md-6 col-lg-3 d-flex align-items-center justify-content-lg-center">
                        <a href="/transactions" class="btn">Transactions</a>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 d-flex align-items-center justify-content-lg-center">
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
