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

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 font-weight-bold mb-0" style="color:black;">VERDE Creative</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">

            <!-- Project Card Example -->
            <div class="card-header py-3" style="border-radius: 10px;
            background: #fff;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5);">
                <h6 class="m-0 font-weight-bold text-primary" style="color:black;">Hi,
                    {{ $staffName }}!<br>Welcome back
                </h6>
            </div>

        </div>
    </div>

    <!-- Dashboard Content Row -->
    <div class="row mt-4">
        <!-- Total Users Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary mb-1">Total User</div>
                        </div>
                            <div class="row no-gutters align-items-right">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success mb-1">Total Pelanggan</div> 
                        </div>
                            <div class="row no-gutters align-items-right">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCustomers }}</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transactions Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info mb-1">Total Transaksi</div>
                        </div>
                            <div class="row no-gutters align-items-right">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTransactions }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
