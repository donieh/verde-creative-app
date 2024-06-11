<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Transaksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Form Tambah Data Transaksi
            </h6>
        </div>
        <form action="/auth/transaction/add/store.php" method="POST" enctype="multipart/form-data">
            <div>
                <div class="card-body" style="display: flex;">
                    <div style="flex: 1; margin-right: 10px;">
                        <div class="form-group">
                            <label>Nama Bisnis:</label>
                            <input type="text" class="form-control" name="business" placeholder="Masukkan Nama Bisnis" required />
                        </div>
                        <!-- <div class="form-group">
                    <label>No Invoice:</label>
                    <input type="number" class="form-control" name="invoiceNumber" placeholder="Masukkan No Invoice" required />
                </div> -->
                        <div class="form-group">
                            <label>Tanggal Mulai:</label>
                            <input type="date" class="form-control" name="startDate" placeholder="Masukkan Tanggal Mulai" required />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai:</label>
                            <input type="date" class="form-control" name="endDate" placeholder="Masukkan Tanggal Selesai" required />
                        </div>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <div class="form-group">
                            <label>Tanggal Invoice:</label>
                            <input type="date" class="form-control" name="invoiceDate" placeholder="Tanggal Invoice" required />
                        </div>
                        <div class="form-group">
                            <label>Discount:</label>
                            <input type="number" class="form-control" name="discount" placeholder="Masukkan Jumlah Discount" />
                        </div>
                        <div class="form-group">
                            <label>Down Payment:</label>
                            <input type="number" class="form-control" name="downPayment" placeholder="Masukkan Jumlah Down Payment" />
                        </div>
                    </div>
                </div>

                <!-- detail transaksi -->
                <div class="card-body shadow mb-4" style="width: 40%; margin-left: 20px; border-radius: 10px">
                    <div id="forms-container">
                        <!-- <div>---</div> -->
                        <div class="form-group">
                            <label>Nama Item:</label>
                            <input type="text" class="form-control" name="itemName[]" placeholder="Masukkan Nama Item" required />
                        </div>
                        <div class="form-group">
                            <label>Nama Paket:</label>
                            <input type="text" class="form-control" name="packageName[]" placeholder="Masukkan Nama Paket" required />
                        </div>
                        <div class="form-group">
                            <label>Kuantitas:</label>
                            <input type="number" class="form-control" name="quantity[]" placeholder="Masukkan Kuantitas" required />
                        </div>
                    </div>
                    <button type="button" id="add-form" class="btn btn-primary">Tambah</button>
                </div>

                <script>
                    document.getElementById('add-form').addEventListener('click', function() {
                        var formsContainer = document.getElementById('forms-container');
                        var newForm = document.createElement('div');
                        newForm.classList.add('form-group');
                        newForm.innerHTML = `
            <label>Nama Item:</label>
            <input type="text" class="form-control" name="itemName[]" placeholder="Masukkan Nama Item" required />
            <label>Nama Paket:</label>
            <input type="text" class="form-control" name="packageName[]" placeholder="Masukkan Nama Paket" required />
            <label>Kuantitas:</label>
            <input type="number" class="form-control" name="quantity[]" placeholder="Masukkan Kuantitas" required />
        `;
                        formsContainer.appendChild(newForm);
                    });
                </script>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="../../auth/dashboard/?menu=transaction" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>

    </div>
</div>