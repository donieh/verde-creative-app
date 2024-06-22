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
                <td colspan="4" align="right"><strong>INVOICE (id)</strong></td>
            </tr>
            <tr>
                <td colspan="4" align="right">Date</td>  
            </tr>
            <tr>
                <td colspan="2">
                    <strong>INVOICE</strong>
                </td>
            </tr>
            <br>
            <tr>
                <td colspan="2">
                    <strong>{{ $client->name }}</strong><br>
                    Client phone<br>
                    Client address
                </td>
                <td colspan="2">
                    {{ $client->phone }}<br>
                    {{ $client->address }}
                </td>
            </tr>

            <br>
            <br>
            <br>

            <tr>
                <td align="center"><strong>ITEM</strong></td>
                <td align="center"><strong>PACKAGE</strong></td>
                <td align="center"><strong>QTY</strong></td>
                <td align="center"><strong>UNIT PRICE</strong></td>
                <td align="center"><strong>TOTAL</strong></td>
            </tr>
            @foreach ($items as $index => $item)
                <tr>
                    <td align="center">{{ $item->item->name }}</td>
                    <td align="center">{{ $item->package ? $item->package->name : '-' }}</td>
                    <td align="center">{{ $item->quantity }}</td>
                    <td align="center">Rp {{ number_format($item->price, 2) }}</td>
                    <td align="center">Rp {{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach

            <br>
            <br>
            <br>
            <tr>
                <td colspan="4" align="right">Subtotal</td>
                <td>Rp {{ number_format($items->sum(function ($item) { return $item->quantity * $item->price; }), 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" align="right">Discount</td>
                <td>Rp {{ number_format($discount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" align="right">Down Payment</td>
                <td>Rp {{ number_format($downPayment, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" align="right"><strong>TOTAL</strong></td>
                <td><strong>Rp {{ number_format($total, 2) }}</strong></td>
            </tr>
        </table>
    </div>
</body>
</html>
