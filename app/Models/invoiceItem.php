<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'invoice_items';

    protected $fillable = [
        'invoiceId',
        'itemId',
        'packageId',
        'quantity'
    ];

    public $timestamps = false;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoiceId');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemId');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'packageId');
    }
}
