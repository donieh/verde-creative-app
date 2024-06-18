@extends('layout.user-panel-layout')

@section('panel_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-custom" style="color:black">Manajemen Transaksi</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-custom" style="color:black">Form Tambah Transaksi</h6>
            </div>
            <form action="/transaction" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    <div class="card-body" style="display: flex;">
                        <div style="flex: 1; margin-right: 10px;">
                            <div class="form-group">
                                <label>Nama Bisnis:</label>
                                <select class="form-control" name="clientId" required>
                                    <option value="">Pilih Klien</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai:</label>
                                <input type="date" class="form-control" name="startDate" id="startDate"
                                    placeholder="Masukkan Tanggal Mulai" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai:</label>
                                <input type="date" class="form-control" name="endDate" id="endDate"
                                    placeholder="Masukkan Tanggal Selesai" required />
                            </div>
                        </div>
                        <div style="flex: 1; margin-right: 10px;">
                            <div class="form-group">
                                <label>Tanggal Invoice:</label>
                                <input type="date" class="form-control" name="invoiceDate" id="invoiceDate"
                                    placeholder="Tanggal Invoice" required />
                            </div>
                            <div class="form-group">
                                <label>Discount:</label>
                                <input type="number" class="form-control" name="discount"
                                    placeholder="Masukkan Jumlah Discount" />
                            </div>
                            <div class="form-group">
                                <label>Down Payment:</label>
                                <input type="number" class="form-control" name="downPayment"
                                    placeholder="Masukkan Jumlah Down Payment" />
                            </div>
                        </div>
                    </div>

                    <!-- detail transaksi -->
                    <div class="card-body shadow mb-4" style="width: 40%; margin-left: 20px; border-radius: 10px">
                        <div id="forms-container">
                            <div class="form-group">
                                <label>Nama Item:</label>
                                <select class="form-control" name="itemId[]" required onchange="loadPackages(this)">
                                    <option value="">Pilih Item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Paket:</label>
                                <select class="form-control" name="packageId[]" required>
                                    <option value="">Pilih Paket</option>
                                    <!-- Packages will be loaded dynamically based on selected item -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kuantitas:</label>
                                <input type="number" class="form-control" name="quantity[]"
                                    placeholder="Masukkan Kuantitas" required />
                            </div>
                        </div>
                        <button type="button" id="add-form" class="btn btn-primary">Tambah</button>
                    </div>

                    <script>
                        function loadPackages(select) {
                            var itemId = select.value;
                            var packageSelect = select.parentElement.nextElementSibling.children[1];
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

                        function formatDate(date) {
                            const year = date.getFullYear();
                            const month = String(date.getMonth() + 1).padStart(2, '0');
                            const day = String(date.getDate()).padStart(2, '0');
                            return `${year}-${month}-${day}`;
                        }

                        function updateDates() {
                            const startDateInput = document.getElementById('startDate');
                            const endDateInput = document.getElementById('endDate');
                            const invoiceDateInput = document.getElementById('invoiceDate');
                            const startDate = new Date(startDateInput.value);

                            if (startDateInput.value) {
                                const endDate = new Date(startDate);
                                endDate.setDate(startDate.getDate() + 30);
                                endDateInput.value = formatDate(endDate);

                                const invoiceDate = new Date(startDate);
                                invoiceDate.setDate(startDate.getDate() + 15);
                                invoiceDateInput.value = formatDate(invoiceDate);
                            }
                        }

                        document.getElementById('startDate').addEventListener('change', updateDates);

                        // Set initial values
                        document.addEventListener('DOMContentLoaded', function() {
                            const startDateInput = document.getElementById('startDate');
                            const today = new Date();
                            startDateInput.value = formatDate(today);
                            updateDates();
                        });
                    </script>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="color: white; background: navy">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/transaction" class="btn" style="color: white; background: orange">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
