@extends('layout.user-panel-layout')
@section('panel_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Manajemen Data Transaksi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color:black" ;>
                    Daftar Transaksi
                </h6>
            </div>

            <div class="card-body">
                <a href="/transaction/create" class="btn" style="color: white; background: #15452f">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="10">Nama Bisnis</th>
                                <th width="100">No Invoice</th>
                                <th width="100">Tanggal Mulai</th>
                                <th width="100">Tanggal Selesai</th>
                                <th width="100">Tanggal Invoice</th>
                                <th width="100">Tanggal Jatuh Tempo</th>
                                <th width="100">Discount</th>
                                <th width="100">Down Payment</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (\App\Models\Invoice::get() as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice->clients->name }}</td>
                                   <td>INVOICE #{{ str_pad($loop->index + 1, 3, '0', STR_PAD_LEFT) }}</td>

                                    <td>{{ $invoice->startDate }}</td>
                                    <td>{{ $invoice->endDate }}</td>
                                    <td>{{ $invoice->invoiceDate }}</td>
                                    <td>{{ $invoice->dueDate }}</td>
                                    <td>{{ 'Rp ' . number_format($invoice->discount, 0, ',', '.') }}</td>
                                    <td>{{ 'Rp ' . number_format($invoice->downPayment, 0, ',', '.') }}</td>

                                    <td>
                                        <a href="/transaction/{{ $invoice->id }}/edit" class="btn"
                                            style="color: white; background: #466d1d">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="/transaction/{{ $invoice->id }}" method="POST"
                                            onsubmit="return confirm('Do you want to delete this?');">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button type="submit" style="color: white; background: #c01605;"
                                                class="btn"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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
