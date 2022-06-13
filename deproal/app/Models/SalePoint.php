<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
{
    use HasFactory;
    use \Eloquence\Behaviours\CamelCasing;

    protected $fillable = [
        'name',
        'photo',
        'cellphone',
        'type',
        'info',
        'address'
    ];

}
