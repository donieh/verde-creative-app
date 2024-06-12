<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'invoiceDate',
        'startDate',
        'endDate',
        'dueDate',
        'staffId',
        'clientId',
        'discount',
        'downPayment',
    ];

    public $timestamps = false;

    public function clients()
    {
        return $this->belongsTo(Client::class, 'clientId', 'id');
    }
}
