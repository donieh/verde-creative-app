<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif;  margin: 0; padding: 0; background-color: #ffffff;}
        .navbar {
            background-color: #15452f; /* Warna hijau */
            padding: 20px 0;
            text-align: center;
            color: #ffffff; /* Warna teks putih */
        }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; 
            border-collapse: separate; border-spacing: 0; padding: 15px; padding-top: 0;}
        .item-column { width: 20%; text-align: center; padding: 10px;} 
        .package-column { width: 15%; text-align: center; padding: 10px;} 
        .qty-column { width: 10%; text-align: center; padding: 10px;} 
        .unit-price-column { width: 20%; text-align: center; padding: 10px;} 
        .total-column { width: 15%; text-align: center; padding: 10px;} 
        .contact-info { text-align: left; font-size: 14px; margin-top: 130px; }
        .contact-info p { margin: 5px 0; margin-left:25px;}
        .total-amount {  font-size: 20px;  color: #15452f; padding:10px; }
        .invoice-details { 
            float: right; 
            text-align: left; 
            max-width: 260px; 
            width: 500%; 
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

    </style>
</head>
<body>
<div class="navbar">
    </div>
    <div class="container">
      <div class="form-logo">
            <img src="../assets/images/verde_wide_green.png" alt="" >
      </div>
</div>
    <div class="invoice-box">
        <table>
            <tr>
                <td colspan="5">
                <div class="invoice-details">
                    <h2>INVOICE #{{ str_pad($invoice->id -5, 3, '0', STR_PAD_LEFT) }}</h2>
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <div class="invoice-details">
                    {{\Carbon\Carbon::parse($invoice->invoiceDate)->format('F d, Y') }}
                </div>
                </td>  
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td colspan="5">
                <div class="invoice-details">
                    Due date: {{\Carbon\Carbon::parse($invoice->dueDate)->format('F d, Y') }}
                </div>
                </td>  
            </tr>
                <td colspan="5">
                    
                <tr>
                        
                </tr>
                </td>  
            </tr>
            <tr>
                <td colspan="2">
                    <h1 class="invoice-title">INVOICE</h1>
                </td>
            </tr>
            
            <tr>
                <td colspan="5">
                    <h2>{{ $client->name }}</h2>
                        
                    <table class="client-details-table">
                    <tr>
                        <td><strong>Client phone</strong></td>
                        <td>{{ $client->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Client address</strong></td>
                        <td>{{ $client->address }}</td>
                    </tr>
                        </table>
                </td>
            </tr>

            <br>
            <br>
            <br>

            <tr class="item-rows">
                <td class="item-column"><strong>ITEM</strong></td>
                <td class="package-column"><strong>PACKAGE</strong></td>
                <td class="qty-column"><strong>QTY</strong></td>
                <td class="unit-price-column"><strong>UNIT PRICE</strong></td>
                <td class="total-column"><strong>TOTAL</strong></td>
            </tr>
            @foreach ($items as $index => $item)
            <tr class="item-row">
                    <td class="item-column"><strong>{{ $item->item->name }}</strong></td>
                    <td class="package-column"><strong>{{ $item->package ? $item->package->name : '-' }}</strong></td>
                    <td class="qty-column">{{ $item->quantity }}</td>
                    <td class="unit-price-column">Rp {{ number_format($item->price) }}</td>
                    <td class="total-column">Rp {{ number_format($item->quantity * $item->price) }}</td>
                </tr>
            @endforeach
            <tr class="price-row">
                <td colspan="4" align="right" style="padding-right: 10px;">Subtotal</td> 
                <td>Rp {{ number_format($items->sum(function ($item) { return $item->quantity * $item->price; })) }}</td>
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
            <td colspan="4" align="right" class="total-amount" ><strong>TOTAL</strong></td>
            <td class="total-amount" style="padding-left: 0;"><strong> Rp {{ number_format($total) }} </strong></td>
            </tr>

        <tr>
            <td colspan="5">
                    <div class="contact-info">
                        <h1 style="display: inline-block;  width: 140px; text-align: left;">CONTACT INFO</h1>
                        <div style="display: inline-block;">
                            <p><strong>VERDE Creative</strong></p>
                        <p>+6285176892077</p>
                        <p>hello.verdecreative@gmail.com</p>
                        <p>IG @verdecreative</p>
                    </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
