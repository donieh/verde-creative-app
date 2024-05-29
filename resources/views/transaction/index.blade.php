<?php
include("../../php/config.php");
include("../models/Transaction.php");

$transaction = new Transaction($conn);

$action = isset($_GET['action']) ? $_GET['action'] : "";
if ($action == "add") {
    include "add/index.blade.php";
} else if ($action == "edit") {
    include "edit/index.blade.php";
} else if ($action == "delete") {
    include "delete/index.blade.php";
} else {
?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen Data Transaksi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color:black" ;>
                    Daftar Transaksi
                </h6>
            </div>

            <div class="card-body">
                <a href="?menu=transaction&action=add" class="btn" style="color: white; background: #15452f">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="10">Nama Bisnis</th>
                                <th width="100">No Invoice</th>
                                <th width="100">Tanggal Mulai</th>
                                <th width="100">Tanggal Selesai</th>
                                <th width="100">Tanggal Invoice</th>
                                <th width="100">Tanggal Jatuh Tempo</th>
                                <th width="100">Discount</th>
                                <th width="100">Down Payment</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $result = $transaction->index();
                            $no = 1;
                            $invoiceNumber = '001';
                            ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row["business"]; ?></td>
                                    <td><?php echo 'INVOICE #' . str_pad($invoiceNumber, 3, '0', STR_PAD_LEFT); ?></td>
                                    <?php $invoiceNumber++;
                                    ?>
                                    <td><?php echo $row["startDate"]; ?></td>
                                    <td><?php echo $row["endDate"]; ?></td>
                                    <td><?php echo $row["invoiceDate"]; ?></td>
                                    <td><?php
                                        // Ambil invoiceDate dari baris yang sedang diproses
                                        $invoiceDate = $row["invoiceDate"];

                                        // Konversi invoiceDate ke format timestamp menggunakan strtotime()
                                        $invoiceTimestamp = strtotime($invoiceDate);

                                        // Tambahkan 15 hari ke invoiceTimestamp
                                        $dueTimestamp = strtotime('+15 days', $invoiceTimestamp);

                                        // Konversi dueTimestamp ke format tanggal kembali menggunakan date()
                                        $dueDate = date('Y-m-d', $dueTimestamp);

                                        // Tampilkan dueDate pada tabel
                                        echo $dueDate ;
                                        ?></td>
                                    <td><?php echo $row["discount"]; ?></td>
                                    <td><?php echo $row["downPayment"]; ?></td>

                                    <td>
                                        <a href="?menu=transaction&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?menu=transaction&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605" onclick="return confirm('Do you want to delete this?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>