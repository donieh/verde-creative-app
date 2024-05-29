<?php
include("../../php/config.php");
include("../models/Product.php");

$product = new Product($conn);

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
        <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen Produk</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color:black" ;>
                    Data Produk
                </h6>
            </div>

            <div class="card-body">
                <a href="?menu=product&action=add" class="btn" style="color: white; background: #15452f">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="10">Item</th>
                                <th width="100">Paket</th>
                                <th width="100">Harga</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $product->index();
                            $no = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row["item"]; ?></td>
                                    <td><?php echo $row["package"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                                                        <td>
                                        <a href="?menu=product&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?menu=product&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605" onclick="return confirm('Do you want to delete this?')">
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