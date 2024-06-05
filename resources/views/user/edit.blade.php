@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Edit Data User</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit User</h6>
            </div>
            <form action="/user/{{$staff->id}}" method="POST">
                @method('PUT')
                {{ csrf_field() }}

                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $staff->id }}" />
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" name="name" value="{{ $staff->name }}" required />
                    </div>
                    <div class="form-group">
                        <label>Jabatan:</label>
                        <input type="text" class="form-control" name="position" value="{{ $staff->position }}" required />
                    </div>
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username" value="{{ $staff->username }}" required />
                    </div>
                    <div class="form-group">
                        <label>Password:<sup class="text-danger">Kosongkan jika tidak mengubah password</sup></label>
                        <input type="password" class="form-control" placeholder="Masukan password" name="password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/user" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
