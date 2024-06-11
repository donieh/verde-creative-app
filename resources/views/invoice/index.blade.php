@extends('layout.user-panel-layout')
@section('panel_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen Paket</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color:black" ;>
                    Data Paket
                </h6>
            </div>

            <div class="card-body">
                <a href="/package/create" class="btn" style="color: white; background: #15452f">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="10">Item</th>
                                <th width="100">Paket</th>
                                <th width="100">Harga</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Package::get() as $package)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $package->item->name }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->price }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="/package/{{ $package->id }}/edit" class="btn"
                                                style="color: white; background: #466d1d;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="/package/{{ $package->id }}" method="POST"
                                                onsubmit="return confirm('Do you want to delete this?');">
                                                @method('delete')
                                                {{ csrf_field() }}
                                                <button type="submit" style="color: white; background: #c01605;"
                                                    class="btn"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
