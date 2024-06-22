<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { width: 100%; padding: 30px; border: 1px solid #eee; }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; }
        .invoice-box table th { padding: 10px; background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; }
        .invoice-box table td { padding: 10px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr>
                <th colspan="2">Invoice #: {{ $invoice->invoiceId }}</th>
                <th>Tanggal Invoice: {{ $invoiceDate }}</th>
                <th>Tanggal Jatuh Tempo: {{ $dueDate }}</th>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Dari:</strong><br>
                    Perusahaan Anda<br>
                    Alamat Anda<br>
                    Kota, Negara, Zip Code
                </td>
                <td colspan="2">
                    <strong>Kepada:</strong><br>
                    {{ $client->name }}<br>
                    {{ $client->address }}<br>
                    {{ $client->city }}, {{ $client->country }}, {{ $client->postalCode }}
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Nama Item</th>
                <th>Nama Paket</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->item->name }}</td>
                    <td>{{ $item->package ? $item->package->name : '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" align="right">Subtotal:</td>
                <td>{{ number_format($items->sum(function ($item) { return $item->quantity * $item->price; }), 2) }}</td>
            </tr>
            <tr>
                <td colspan="5" align="right">Discount:</td>
                <td>{{ number_format($discount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="5" align="right">Down Payment:</td>
                <td>{{ number_format($downPayment, 2) }}</td>
            </tr>
            <tr>
                <td colspan="5" align="right"><strong>Total:</strong></td>
                <td><strong>{{ number_format($total, 2) }}</strong></td>
            </tr>
        </table>
    </div>
</body>
</html>
