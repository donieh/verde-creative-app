@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Item</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Item</h6>
            </div>
            <form action="/item/{{ $item->id }}" method="POST">
                @method('PUT')
                {{ csrf_field() }}

                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $item->id }}" />

                    <div class="form-group">
                        <label>Nama Item:</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" required />
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/item" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
