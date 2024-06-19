@extends('layout.user-panel-layout')
@section('panel_content')
@php
    /** @var \App\Models\Staff $username */
    $staff = session()->get('logged_in_user');
    $staffName = $staff->name;

    // Data dari controller
    $totalUsers = $totalUsers ?? 0;
    $totalCustomers = $totalCustomers ?? 0;
    $totalTransactions = $totalTransactions ?? 0;
@endphp

<!-- Set background color for the whole page -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    body {
        background-color: #ffffff;
    }
    body, h5, p {
        font-family: 'Poppins', sans-serif;
    }
    .custom-text {
        color: #000000; /* Warna hitam untuk teks */
    }
</style>

<div class="container-fluid" style="background: #ffffff;">
    <div class="row" style="background: #ffffff;">
        <div class="col-sm-12" style="background: #ffffff;">
            <div class="card-header py-3" style="background: #ffffff;">
                <h4 class="m-0 font-weight-bold" style="color:#004d00;">Hi,
                    {{ $staffName }}! </h4>
                <h6 class="m-0 font-weight-bold" style="color:#004d00;">Welcome back
                </h6>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-header py-2" style="border-radius: 10px;
            background: #F5F5F5; border:#F5F5F5;">
    <!-- Dashboard Content Row -->
    <div class="row mt-4">
        <!-- Total Users Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color:#D9D9D9; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-s font-weight-bold mb-1" style="color:#004d00;">Total User</div>
                        </div>
                        <div class="col text-right">
                            <div class="h3 mb-0" style="color:#004d00;">{{ $totalUsers }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Total Customers Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color:#D9D9D9; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-s font-weight-bold mb-1" style="color:#004d00;">Total Pelanggan</div>
                        </div>
                        <div class="col text-right">
                            <div class="h3 mb-0 font-weight-bold" style="color:#004d00;">{{ $totalCustomers }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transactions Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color:#D9D9D9; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-s font-weight-bold mb-1" style="color:#004d00;">Total Transaksi</div>
                        </div>
                        <div class="col text-right">
                            <div class="h3 mb-0 font-weight-bold" style="color:#004d00;">{{ $totalTransactions }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
        </div>
    </div>

    <!-- Graphs Row -->
    <div class="row mt-4">
        <!-- Transaction Chart -->
        <div class="col-md-6 mb-4"> <!-- Perkecil lebar kolom grafik -->
            <div class="card h-100 py-2" style="background-color:#F5F5F5; border-radius:15px; height:400px; border:#F5F5F5"> <!-- Atur tinggi -->
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-left custom-text"> <!-- Posisi label di sebelah kiri -->
                            <h5 style="font-size: 1rem; color: #000;">Transaksi</h5>
                            <p style="font-size: 1rem; color: #000;">{{ $totalTransactions }}</p>
                        </div>
                        <a href="/transactions" class="btn btn-light btn-sm shadow" style="color: #5A6ACF; border-radius: 5px;">View</a>
                    </div>
                    <canvas id="transactionsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- New Users Chart -->
        <!-- <div class="col-md-6 mb-4"> 
            <div class="card h-100 py-2" style="background-color:#F5F5F5; border-radius:15px; height:400px; border:#F5F5F5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-left custom-text"> 
                            <h5 style="font-size: 1rem; color: #000;">Pendapatan</h5>
                            <p style="font-size: 1rem; color: #000;">{{ $totalUsers }}</p>
                        </div>
                        <a href="/users" class="btn btn-light btn-sm shadow" style="color: #5A6ACF; border-radius: 5px;">View</a>
                    </div>
                    <canvas id="newUsersChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>  -->

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script to create the chart -->
<script>
    // Get the data from the server (using blade syntax to embed PHP variables)
    var totalTransactions = @json($totalTransactions);

    // Get the canvas element
    var ctx = document.getElementById('transactionsChart').getContext('2d');

    // Create the chart
    var transactionsChart = new Chart(ctx, {
        type: 'line', // Type of chart
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // X-axis labels
            datasets: [{
                label: 'Transaksi',
                data: totalTransactions, // Data to plot
                borderColor: '#6a0dad', // Line color (purple)
                backgroundColor: 'rgba(106, 13, 173, 0.2)', // Fill color (purple with transparency)
                borderWidth: 2, // Line width
                // Remove the points
                pointRadius: 0,
                pointHitRadius: 10,
                pointHoverRadius: 0
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false //

                },
            },
            scales: {
                x: {
                    grid: {
                        display: false // Hide x-axis grid lines
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false // Hide y-axis grid lines
                    },
                    ticks: {
                        display: false // Hide y-axis ticks
                    }
                }
            },
            elements: {
                line: {
                    tension: 0.4 // Add a bit of curve to the line
                }
            }
        }
    });
</script>

@endsection
