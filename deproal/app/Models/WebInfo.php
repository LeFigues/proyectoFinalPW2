<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    use HasFactory;
    use \Eloquence\Behaviours\CamelCasing;

    protected $fillable = [
        'catname',
        'fondo',
        'imghistory',
        'history',
        'carrousel1',
        'carrousel1text',
        'carrousel2',
        'carrousel2text',
        'carrousel3',
        'carrousel3text',
        'select1',
        'select2',
        'select3'
    ];

}
