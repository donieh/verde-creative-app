@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Item</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                    Form Tambah Item
                </h6>
            </div>
            <form action="/invoiceItem" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Item</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Item"
                            required />
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/invoiceItem" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
