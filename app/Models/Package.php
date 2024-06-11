<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'price',
        'itemId',
    ];

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemId', 'id');
    }
}
