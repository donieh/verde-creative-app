<?php
// Include necessary files (adjust paths as needed)
include("../../php/config.php");
include("../models/User.php");

// Create a new instance of the User class
$user = new User($conn);

$action = isset($_GET['action']) ? $_GET['action'] : "";

try {
    if ($action == "add") {
        include "add/index.php";
    } else if ($action == "edit") {
        include "edit/index.php";
    } else if ($action == "delete") {
        include "delete/index.php";
    } else {
        // Display the user management interface
        ?>

        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen User</h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: black;">Data User</h6>
                </div>

                <div class="card-body">
                    <a href="?menu=user&action=add" class="btn" style="color: white; background: #15452f;">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $user->index();
                                $no = 1;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["position"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td>
                                            <a href="?menu=user&action=edit&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #466d1d;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?menu=user&action=delete&id=<?php echo $row['id']; ?>" class="btn" style="color: white; background: #c01605;" onclick="return confirm('Do you want to delete this?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
