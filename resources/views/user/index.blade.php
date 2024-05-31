@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: black;">Data User</h6>
            </div>

            <div class="card-body">
                <a href="/user/create" class="btn" style="color: white; background: #15452f;">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Staff::get() as $staff)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->position }}</td>
                                    <td>{{ $staff->username }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="/user/{{ $staff->id }}/edit" class="btn"
                                                style="color: white; background: #466d1d;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- <a href="?menu=user&action=delete&id={{ $staff->id }}" class="btn"
                                            style="color: white; background: #c01605;"
                                            onclick="return confirm('Do you want to delete this?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a> --}}

                                            <form action="/user/{{ $staff->id }}" method="POST"
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
