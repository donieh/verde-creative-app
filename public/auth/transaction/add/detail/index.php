<?php
include("../../php/config.php");
include("../models/TransactionDetail.php");

$transactionDetail = new TransactionDetail($conn);

// $action = isset($_GET['action']) ? $_GET['action'] : "";
// if ($action == "add") {
//     include "add/index.php";
// } else if ($action == "edit") {
//     include "edit/index.php";
// } else {

$action = isset($_GET['action']) ? $_GET['action'] : "";
$detailAction = isset($_GET['detail']) ? $_GET['detail'] : "";

if ($action == "add" && $detailAction == "add") {
    include "../detail/add/index.php";
} else if ($action == "edit" && $detailAction == "edit") {
    include "../detail/edit/index.php";
} else {
?>
<div class="card mt-5">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-center">Detail Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="10">Item</th>
                        <th width="100">Paket</th>
                        <th width="100">Kuantitas</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $result = $transactionDetail->index();
                    $no = 1;
                    // $invoiceNumber = '001';
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["itemName"]; ?></td>
                            <td><?php echo $row["packageName"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td>
                                <a href="?menu=transactionDetail&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?menu=transactionDetail&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605" onclick="return confirm('Do you want to delete this?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <!--                   
                        <tr>
                        <td width="10">1</td>
                        <td width="10">SMM</td>
                        <td width="100">Splendor</td>
                        <td width="100">1</td>
                        <td><a href="?menu=transaction&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?menu=transaction&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605" onclick="return confirm('Do you want to delete this?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a></td>
                        </tr> -->

                </tbody>

            </table>
            <a href="?menu=transactionDetail&id=2" class="btn" style="color: white; background: #15452f">
                    <i class="fas fa-plus"></i> Tambah
                </a>
        </div>
    </div>
</div>


<?php
}
?>