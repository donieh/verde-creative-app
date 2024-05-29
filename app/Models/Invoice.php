<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $table = "invoices";

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $auditTimestamps = true;

    public $fillable = [
        'id',
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
        'dueDate',
    ];
}
