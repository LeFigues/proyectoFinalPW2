<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EasyInvoice extends Model
{
    use HasFactory;
    use \Eloquence\Behaviours\CamelCasing;
    protected $fillable = [
        'invoiceNumber',
        'invoiceDate',
        'invoiceLocation',
        'invoiceTotal',
        'employee',
        'customer',
        'nit',
        'cellphone',
        'invoiceInfo',
        'invoiceTypePayment'
    ];
}
