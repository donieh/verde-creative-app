@extends('layout.user-panel-layout')

@section('panel_content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-custom" style="color:black">Edit Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Edit Transaksi</h6>
        </div>
        <form action="/transaction/{{ $invoice->id }}" method="POST" enctype="multipart/form-data">
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

                {{-- detail transaksi --}}
                <div class="card-body shadow mb-4" style="width: 40%; margin-left: 20px; border-radius: 10px">
                    <div id="forms-container">
                        <div class="form-group">
                            <label>Nama Item:</label>
                            <select class="form-control" id="itemSelect" onchange="loadPackages(this)">
                                <option value="">Pilih Item</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Paket:</label>
                            <select class="form-control" id="packageSelect">
                                <option value="">Pilih Paket</option>
                                <!-- Packages will be loaded dynamically based on selected item -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kuantitas:</label>
                            <input type="number" class="form-control" id="quantityInput" placeholder="Masukkan Kuantitas" />
                        </div>
                        <div class="form-group">
                            <label>Harga:</label>
                            <input type="decimal" class="form-control" id="priceInput" placeholder="Masukkan Harga" />
                        </div>
                    </div>
                    <button type="button" id="add-form" class="btn btn-primary">Tambah</button>
                </div>

                <!-- Hidden input to store added items -->
                <input type="hidden" id="invoiceItems" name="invoiceItems" value="{{ json_encode($invoice->items) }}">

                {{-- table detail transaksi --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th width="10">Nama Item</th>
                                    <th width="100">Nama Paket</th>
                                    <th width="100">Kuantitas</th>
                                    <th width="100">Harga</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceItemsTable">
                                @foreach ($invoice->items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->package->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
        var packageSelect = document.getElementById('packageSelect');
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
        var itemSelect = document.getElementById('itemSelect');
        var packageSelect = document.getElementById('packageSelect');
        var quantityInput = document.getElementById('quantityInput');
        var priceInput = document.getElementById('priceInput');

        if (itemSelect.value && packageSelect.value && quantityInput.value && priceInput.value) {
            var itemText = itemSelect.options[itemSelect.selectedIndex].text;
            var packageText = packageSelect.options[packageSelect.selectedIndex].text;
            var quantity = quantityInput.value;
            var price = priceInput.value;

            var table = document.getElementById('invoiceItemsTable');
            var row = table.insertRow();
            row.innerHTML = `
                <td>${table.rows.length + 1}</td>
                <td>${itemText}</td>
                <td>${packageText}</td>
                <td>${quantity}</td>
                <td>${price}</td>
                <td>
                    <button type="button" class="btn btn-warning" onclick="editRow(this)">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                </td>
            `;

            var items = JSON.parse(document.getElementById('invoiceItems').value);
            items.push({
                itemId: itemSelect.value,
                packageId: packageSelect.value,
                quantity: quantity,
                price: price
            });
            document.getElementById('invoiceItems').value = JSON.stringify(items);

            itemSelect.value = '';
            packageSelect.innerHTML = '<option value="">Pilih Paket</option>';
            quantityInput.value = '';
            priceInput.value = '';
        } else {
            alert('Isi semua field');
        }
    });

    function removeRow(button) {
        var row = button.parentElement.parentElement;
        var index = row.rowIndex - 1;
        var items = JSON.parse(document.getElementById('invoiceItems').value);
        items.splice(index, 1);
        document.getElementById('invoiceItems').value = JSON.stringify(items);
        row.remove();
        updateTableRowNumbers();
    }

    function updateTableRowNumbers() {
        var table = document.getElementById('invoiceItemsTable');
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].cells[0].innerText = i + 1;
        }
    }

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Loop through each row in the table
        var rows = document.querySelectorAll('#invoiceItemsTable tr');
        rows.forEach(function(row) {
            var editButton = row.querySelector('.btn-warning');
            editButton.addEventListener('click', function() {
                editRow(this, row.rowIndex - 1);
            });
        });
    });

    function editRow(button, rowIndex) {
        var row = button.parentNode.parentNode;
        var itemCell = row.cells[1];
        var packageCell = row.cells[2];
        var quantityCell = row.cells[3];
        var priceCell = row.cells[4];

        var itemText = itemCell.innerText;
        var packageText = packageCell.innerText;
        var quantity = quantityCell.innerText;
        var price = priceCell.innerText;

        // Set selected item and package in dropdowns
        var itemSelect = document.getElementById('itemSelect');
        var packageSelect = document.getElementById('packageSelect');

        // Loop through options to find matching item and package
        for (var i = 0; i < itemSelect.options.length; i++) {
            if (itemSelect.options[i].text === itemText) {
                itemSelect.selectedIndex = i;
                break;
            }
        }

        // Fetch packages based on selected item
        loadPackages(itemSelect);

        // Set selected package
        setTimeout(function() { // Delay to ensure packages are loaded
            for (var j = 0; j < packageSelect.options.length; j++) {
                if (packageSelect.options[j].text === packageText) {
                    packageSelect.selectedIndex = j;
                    break;
                }
            }
        }, 500); // Adjust delay time as needed

        // Set quantity and price
        document.getElementById('quantityInput').value = quantity;
        document.getElementById('priceInput').value = price;

        // Remove the row from table and update hidden input field
        removeRow(button);
    }

    // Set initial values
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('startDate');
        const today = new Date();
        startDateInput.value = formatDate(today);
        updateDates();
    });
</script>
@endsection
