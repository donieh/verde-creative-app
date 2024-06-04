@extends('layout.user-panel-layout')

@section('panel_content')
   @php
    /** @var \App\Models\Staff $username */
    $staff = session()->get('logged_in_user');

    $staffName = $staff->name;
@endphp

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 font-weight-bold mb-0" style="color:black" ;>VERDE Creative Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">

            <!-- Project Card Example -->
            <div class="card-header py-3" style="border-radius: 10px;
            background: #fff;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5);">
                <h6 class="m-0 font-weight-bold text-primaryx" style="color:black;">Welcome,
                    {{ $staffName }}!<br>---<br>You are an authorize admin!
                </h6>
            </div>

        </div>
    </div>

</div>
@endsection