<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EasyInvoiceDetail extends Model
{
    use HasFactory;
    use \Eloquence\Behaviours\CamelCasing;

    protected $fillable = [
        'productId',
        'invoiceId',
        'quantity'
    ];
}
