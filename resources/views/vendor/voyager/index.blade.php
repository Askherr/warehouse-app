@extends('voyager::master')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')

        <div class="container-fluid" style="margin-bottom:2%">
            <h3 class="my-4"><i class="voyager-bar-chart"></i> Dashboard</h3>
        </div>

        <div class="container-fluid mt-3">
            <div class="row">
                <!-- Card untuk Jumlah Karyawan -->
                <a href="/admin/karyawans">
                    <div class="col-md-3">
                        <div style="font-weight:bold; color: white; font-size:large; border-radius:20px;" class="card text-center mb-3">
                            <div style="background-color: #211C6A;" class="card-header">Jumlah Karyawan</div>
                            <div class="card-body">
                                <h4 style="color: black;" class="card-title">{{ $jumlahKaryawan }}</h4>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card untuk Barang Masuk -->
                <a href="/admin/data-stoks">
                    <div class="col-md-3">
                        <div style="font-weight:bold;color: white; font-size:large; border-radius:20px;" class="card text-center mb-3">
                            <div style="background-color: #59B4C3;" class="card-header">Jumlah Barang Masuk</div>
                            <div class="card-body">
                                <h4 style="color: black;" class="card-title">{{ $jumlahBarangMasuk }}</h4>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card untuk Barang Keluar -->
                <div class="col-md-3">
                    <div style="font-weight:bold;color: white; font-size:large; border-radius:20px;" class="card text-center mb-3">
                        <div style="background-color: #74E291;" class="card-header">Jumlah Barang Keluar</div>
                        <div class="card-body">
                            <h4 style="color: black;" class="card-title">{{ $jumlahBarangKeluar }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Card untuk Stok -->
                <div class="col-md-3">
                    <div style="font-weight:bold;color: white; font-size:large; border-radius:20px;" class="card text-center mb-3">
                        <div style="background-color:#EFF396;" class="card-header">Stok Total</div>
                        <div class="card-body">
                            <h4 style="color: black;" class="card-title">{{ $jumlahStok }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
    <div class="row" style="text-align:center, justify-content:center">
        <div class="col-md-5">
            <canvas id="myPieChart"></canvas>
        </div>
        <div class="col-md-5">
            <canvas id="myBarChart"></canvas>
        </div>
    </div>
</div>

    </div>

    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Jumlah Karyawan', 'Barang Masuk', 'Barang Keluar', 'Stok Total'],
                datasets: [{
                    data: [{{ $jumlahKaryawan }}, {{ $jumlahBarangMasuk }}, {{ $jumlahBarangKeluar }}, {{ $jumlahStok }}],
                    backgroundColor: ['#211C6A', '#59B4C3', '#74E291', '#EFF396'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        })
        ;
        const barCtx = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Karyawan', 'Barang Masuk', 'Barang Keluar', 'Stok'],
                datasets: [{
                    label: 'Jumlah',
                    // data: [65, 59, 80, 81, 56, 55],
                    data: [{{ $jumlahKaryawan }}, {{ $jumlahBarangMasuk }}, {{ $jumlahBarangKeluar }}, {{ $jumlahStok }}],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }});

    </script>
<style>
    #myPieChart{
        text-align: center;
        justify-content: center;
    }

</style>
@stop
