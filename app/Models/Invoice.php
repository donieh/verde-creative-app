<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'code',
        'invoiceDate',
        'quantity',
        'totalPrice',
        'subTotal',
        'discount',
        'downPayment',
        'grandTotal',
        'startDate',
        'endDate',
        'dueDate'
        // 'clientId',
        // 'staffId',
    ];

    public $timestamps = false;

    public function invoice_items()
    {
        return $this->belongsTo(InvoiceItem::class, 'clientId', 'staffId', 'id');
    }
}
