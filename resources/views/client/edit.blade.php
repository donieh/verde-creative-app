@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data Pelanggan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Pelanggan</h6>
            </div>
            <form action="/client/{{$client->id}}" method="POST">
                @method('PUT')
                {{ csrf_field() }}

                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $client->id }}" />
                    <div class="form-group">
                        <label>Kode:</label>
                        <input type="text" class="form-control" name="code" value="{{ $client->code }}" required />
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan:</label>
                        <input type="text" class="form-control" name="name" value="{{ $client->name }}" required />
                    </div>
                    <div class="form-group">
                        <label>Nama Penanggung Jawab:</label>
                        <input type="text" class="form-control" name="contactPerson" value="{{ $client->contactPerson }}" required />
                    </div>
                    <div class="form-group">
                        <label>No Telepon:</label>
                        <input type="number" class="form-control" name="phone" value="{{ $client->phone }}" required />
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" class="form-control" name="address" value="{{ $client->address }}" required />
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
