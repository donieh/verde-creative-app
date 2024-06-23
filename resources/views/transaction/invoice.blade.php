<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .navbar {
            background-color: #15452f;
            padding: 20px 0;
            text-align: center;
            color: #ffffff;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-logo {
            display: inline-block;
            /* margin-top: 30px; */
        }

        .form-details {
            flex: 1;
            display: inline-block;
            margin-top: 0;
            padding-top: 0;

        }

        .invoice-details {
            margin-top: 0;
        }

        .invoice-details .date-details {

            justify-content: space-between;
            display: inline-block;
            /* width: 140px; text-align: left; */
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: separate;
            border-spacing: 0;
            padding: 15px;
            padding-top: 0;
        }

        .item-column,
        .package-column,
        .qty-column,
        .unit-price-column,
        .total-column {
            text-align: center;
            padding: 10px;
        }

        .item-column {
            width: 20%;
        }

        .package-column {
            width: 15%;
        }

        .qty-column {
            width: 10%;
        }

        .unit-price-column {
            width: 20%;
        }

        .total-column {
            width: 15%;
        }

        .contact-info {
            text-align: left;
            font-size: 14px;
            margin-top: 100px;
            margin-left: 30px;
        }

        .contact-info p {
            margin: 5px 0;
            margin-left: 25px;
        }

        .total-amount {
            font-size: 20px;
            color: #15452f;
            padding: 10px;
        }

        .invoice-title {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .invoice-box table tr.item-rows td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item-row td {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
        }

        .invoice-box table tr.price-row td {
            padding-top: 100px;
        }

        .form-logo {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-logo">
            <img src="https://res.cloudinary.com/debtht7tz/image/upload/c_scale,h_120,w_360/verde/ogiaqqswmktiunzut4o3.jpg"
                alt="logo">
        </div>

        <div class="form-details">
            <div class="invoice-details">
                <h2>INVOICE #{{ str_pad($invoice->id - 12, 3, '0', STR_PAD_LEFT) }}</h2>
            </div>
            <div class="invoice-details">
                <div class="date-details">
                    <span><strong>Tanggal Invoice:</span>
                    <span>{{ \Carbon\Carbon::parse($invoice->invoiceDate)->format('F d, Y') }}</span>
                </div>
            </div>
            <div class="invoice-details">
                <div class="date-details">
                    <span><strong>Tanggal Jatuh Tempo:</span>
                    <span>{{ \Carbon\Carbon::parse($invoice->dueDate)->format('F d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-box">
        <div class="container">
            <h1 style="margin-left: 15px;">{{ $client->name }}</h1>

            <table class="client-details-table">
                <tbody>
                    <tr>
                        <td><strong>Client PIC</strong></td>
                        <td>{{ $client->contactPerson }}</td>
                    </tr>
                    <tr>
                        <td><strong>Client Phone</strong></td>
                        <td>{{ $client->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Client Address</strong></td>
                        <td>{{ $client->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        <br>
        <div class="item-details">
            <table>
                <thead>
                    <tr class="item-rows">
                        <td class="item-column"><strong>ITEM</strong></td>
                        <td class="package-column"><strong>PACKAGE</strong></td>
                        <td class="qty-column"><strong>QTY</strong></td>
                        <td class="unit-price-column"><strong>UNIT PRICE</strong></td>
                        <td class="total-column"><strong>TOTAL</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr class="item-row">
                            <td class="item-column"><strong>{{ $item->item->name }}</strong></td>
                            <td class="package-column">
                                <strong>{{ $item->package ? $item->package->name : '-' }}</strong>
                            </td>
                            <td class="qty-column">{{ $item->quantity }}</td>
                            <td class="unit-price-column">Rp {{ number_format($item->price) }}</td>
                            <td class="total-column">Rp {{ number_format($item->quantity * $item->price) }}</td>
                        </tr>
                    @endforeach
                    <tr class="price-row">
                        <td colspan="4" align="right" style="padding-right: 10px;">Subtotal</td>
                        <td>Rp
                            {{ number_format($items->sum(function ($item) {return $item->quantity * $item->price;})) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" style="padding-right: 10px;">Discount</td>
                        <td>Rp {{ number_format($discount) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" style="padding-right: 10px;">Down Payment</td>
                        <td>Rp {{ number_format($downPayment) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" class="total-amount"><strong>TOTAL</strong></td>
                        <td class="total-amount" style="padding-left: 0;"><strong> Rp {{ number_format($total) }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="contact-info">
                <h1 style="display: inline-block; width: 140px; text-align: left;">CONTACT INFO</h1>
                <div style="display: inline-block;">
                    <p><strong>VERDE Creative</strong></p>
                    <p>+6285176892077</p>
                    <p>hello.verdecreative@gmail.com</p>
                    <p>IG @verdecreative</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
