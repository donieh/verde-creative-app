<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Transaksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Form Tambah Data Transaksi
            </h6>
        </div>
        <form action="/auth/transaction/add/detail/add/store.php" method="POST" enctype="multipart/form-data">
            <div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Item:</label>
                        <input type="text" class="form-control" name="business" placeholder="Masukkan Nama Item" required />
                    </div>
                    <div class="form-group">
                        <label>Nama Paket:</label>
                        <input type="text" class="form-control" name="business" placeholder="Masukkan Nama Paket" required />
                    </div>
                    <div class="form-group">
                        <label>Kuantitas:</label>
                        <input type="number" class="form-control" name="business" placeholder="Masukkan Kuantitas" required />
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=transaction&action=add" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>

    </div>
</div>