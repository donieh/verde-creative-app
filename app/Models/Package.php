<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'packages';

    public $fillable = [
        'id',
        'name',
        'price',
    ];
}
