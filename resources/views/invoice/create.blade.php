@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Paket</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                    Form Tambah Paket
                </h6>
            </div>
            <form action="/package" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Item</label>
                        <select class="form-control" name="itemId" required>
                            <option value="">Pilih Item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Paket"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Paket"
                            required />
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/package" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
