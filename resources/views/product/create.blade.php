@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Produk</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                    Form Tambah Produk
                </h6>
            </div>
            <form action="/product" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Item</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Item"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Nama Package</label>
                        <input type="text" class="form-control" name="package" placeholder="Masukkan Nama Package"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Produk"
                            required />
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/product" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
