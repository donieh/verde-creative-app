<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black";>Manajemen User</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Form Tambah User
            </h6>
        </div>
        <form action="/auth/user/add/store.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <!-- <div class="form-group">
                    <label>Kode:</label>
                    <input type="text" class="form-control" name="id" placeholder="id" required />
                </div> -->
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama User" required />
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control" name="position" placeholder="Masukkan Jabatan" required />
                </div>
                <div class="form-group">
                    <label>Masukkan Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required />
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required />
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