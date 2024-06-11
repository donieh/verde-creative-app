<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'invoice_items';

    protected $fillable = [
        'id',
        'quantity',
        'price',
        'invoiceId',
        'itemId',
        'packageId'
    ];

    public $timestamps = false;
    
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}