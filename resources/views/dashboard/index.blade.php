@extends('layout.user-panel-layout')

@section('panel_content')
   @php
    /** @var \App\Models\Staff $username */
    $staff = session()->get('logged_in_user');

    $staffName = $staff->name;
@endphp

<<<<<<< HEAD
    <title>VERDE Creative Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/style/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERDE Creative Admin</title>

    <!-- css -->
    <!-- <link rel="stylesheet" href="../../assets/style/styleBackOffice.css"> -->

    <!-- font -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "menu.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "menu_top.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                $menu = isset($_GET['menu']) ? $_GET['menu'] : "";
                if ($menu == "") {
                    include "dashboard.php";
                } else if ($menu == "client") {
                    include "../client/index.blade.php";
                } else if ($menu == "user") {
                    include "../user/index.blade.php";
                } else if ($menu == "product") {
                    include "../product/index.blade.php";
                } else if ($menu == "transaction") {
                    include "../transaction/index.blade.php";
                } else if ($menu == "transactionDetail") {
                    include "../transaction/add/detail/add/index.blade.php";
                } else {
                    include "blank_page.php";
                }
                ?>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; VERDE Creative 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
=======
<div class="container-fluid">
>>>>>>> 7bbe9331de143b255147073fe3dc67f657f4c06d

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
