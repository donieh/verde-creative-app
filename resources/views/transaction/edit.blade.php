@extends('layout.user-panel-layout')

@section('panel_content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Transaksi</h6>
        </div>
        <form action="/invoice/{{ $invoice->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card-body">
                <div style="display: flex; gap: 10px;">
                    <div style="flex: 1;">
                        <div class="form-group">
                            <label>Nama Bisnis:</label>
                            <select class="form-control" name="clientId" required>
                                <option value="">Pilih Klien</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $invoice->clientId == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai:</label>
                            <input type="date" class="form-control" name="startDate" value="{{ $invoice->startDate }}" required />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai:</label>
                            <input type="date" class="form-control" name="endDate" value="{{ $invoice->endDate }}" required />
                        </div>
                    </div>
                    <div style="flex: 1;">
                        <div class="form-group">
                            <label>Tanggal Invoice:</label>
                            <input type="date" class="form-control" name="invoiceDate" value="{{ $invoice->invoiceDate }}" required />
                        </div>
                        <div class="form-group">
                            <label>Discount:</label>
                            <input type="number" class="form-control" name="discount" value="{{ $invoice->discount }}" placeholder="Masukkan Jumlah Discount" />
                        </div>
                        <div class="form-group">
                            <label>Down Payment:</label>
                            <input type="number" class="form-control" name="downPayment" value="{{ $invoice->downPayment }}" placeholder="Masukkan Jumlah Down Payment" />
                        </div>
                    </div>
                </div>

                <div class="card-body shadow mb-4" style="border-radius: 10px;">
                    <div id="forms-container">
                        @foreach ($invoice->items as $item)
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label>Nama Item:</label>
                                <select class="form-control" name="itemId[]" required onchange="loadPackages(this)">
                                    <option value="">Pilih Item</option>
                                    @foreach ($items as $itm)
                                        <option value="{{ $itm->id }}" {{ $item->itemId == $itm->id ? 'selected' : '' }}>{{ $itm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label>Nama Paket:</label>
                                <select class="form-control" name="packageId[]" required>
                                    <option value="">Pilih Paket</option>
                                    @foreach ($item->item->packages as $package)
                                        <option value="{{ $package->id }}" {{ $item->packageId == $package->id ? 'selected' : '' }}>{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label>Kuantitas:</label>
                                <input type="number" class="form-control" name="quantity[]" value="{{ $item->quantity }}" placeholder="Masukkan Kuantitas" required />
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-form" class="btn btn-primary">Tambah</button>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="/transaction" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function loadPackages(select) {
        var itemId = select.value;
        var packageSelect = select.parentElement.nextElementSibling.querySelector('select[name="packageId[]"]');
        packageSelect.innerHTML = '<option value="">Loading...</option>';

        if (itemId) {
            fetch(`/get-packages-by-item/${itemId}`)
                .then(response => response.json())
                .then(data => {
                    packageSelect.innerHTML = '<option value="">Pilih Paket</option>';
                    data.forEach(package => {
                        var option = document.createElement('option');
                        option.value = package.id;
                        option.textContent = package.name;
                        packageSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching packages:', error);
                    packageSelect.innerHTML = '<option value="">Error loading packages</option>';
                });
        } else {
            packageSelect.innerHTML = '<option value="">Pilih Item terlebih dahulu</option>';
        }
    }

    document.getElementById('add-form').addEventListener('click', function() {
        var formsContainer = document.getElementById('forms-container');
        var newForm = document.createElement('div');
        newForm.classList.add('form-group');
        newForm.style.marginBottom = '10px';
        newForm.innerHTML = `
            <label>Nama Item:</label>
            <select class="form-control" name="itemId[]" required onchange="loadPackages(this)">
                <option value="">Pilih Item</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label>Nama Paket:</label>
            <select class="form-control" name="packageId[]" required>
                <option value="">Pilih Paket</option>
                <!-- Packages will be loaded dynamically based on selected item -->
            </select>
            <label>Kuantitas:</label>
            <input type="number" class="form-control" name="quantity[]" placeholder="Masukkan Kuantitas" required />
        `;
        formsContainer.appendChild(newForm);
    });
</script>
@endsection
