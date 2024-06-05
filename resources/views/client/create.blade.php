@extends('layout.client-panel-layout')

@section('panel_content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black";>Manajemen Pelanggan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Form Tambah Pelanggan
            </h6>
        </div>
        <form action="/client" method="POST" enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label>Kode:</label>
                    <input type="text" class="form-control" name="code" placeholder="Masukkan Kode Perusahaan" required />
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan:</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Perusahaan" required />
                </div>
                <div class="form-group">
                    <label>Nama Penanggung Jawab:</label>
                    <input type="text" class="form-control" name="contactPerson" placeholder="Masukkan Nama PJ Perusahaan" required />
                </div>
                <div class="form-group">
                    <label>No Telepon:</label>
                    <input type="number" class="form-control" name="phone" placeholder="Masukkan No Tlp Perusahaan" required />
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <input type="number" class="form-control" name="address" placeholder="Masukkan Alamat Perusahaan" required />
                </div>

            </div>

            <div class="card-footer">
            <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="/client" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>

    </div>
</div>
@endsection