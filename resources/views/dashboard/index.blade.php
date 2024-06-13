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
    body {
        background-color: #ffffff !important;
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="color:#004d00;">VERDE Creative</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">

            <!-- Project Card Example -->
            <div class="card-header py-3" style="border-radius: 10px;
            background: #fff;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5);">
                <h4 class="m-0 font-weight-bold" style="color:#004d00;">Hi,
                    {{ $staffName }}! </h4>
                    <h5 class="m-0 font-weight-bold" style="color:#004d00;">Welcome back
                </h5>
                
            </div>

        </div>
    </div>

    <!-- Dashboard Content Row -->
    <div class="row mt-4">
        <!-- Total Users Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color:#e2e6ea; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <!-- Adjusted the layout here -->
                        <div class="col">
                            <div class="text-s font-weight-bold mb-1" style="color:#004d00;">Total User</div>
                        </div>
                        <div class="col text-right">
                            <div class="h3 mb-0 font-weight-bold" style="color:#004d00;">{{ $totalUsers }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color:#e2e6ea; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <!-- Adjusted the layout here -->
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
            <div class="card shadow h-100 py-2" style="background-color:#e2e6ea; border-radius:15px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <!-- Adjusted the layout here -->
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
@endsection
