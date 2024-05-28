<?php
include("../../php/config.php");

// Check if ID is provided via GET parameter
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch user data based on the ID
    $userData = $user->getById($id);

    if(!$userData) {
        // Handle if user data not found
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    // Handle if ID parameter is missing
    echo "ID tidak ditemukan";
    exit;
}
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Pelanggan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Pelanggan</h6>
        </div>
        <form action="/auth/user/edit/updated.php" method="POST"> 
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $userData['id']; ?>" />
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $userData['name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control" name="position" value="<?php echo $userData['position']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $userData['username']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Password:<sup class="text-danger">Kosongkan jika tidak mengubah password</sup></label> 
                    <input type="password" class="form-control" placeholder="Masukan password" name="password" >
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=user" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
