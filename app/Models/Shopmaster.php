<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopmaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'shop_name',
        'phone_number',
    ];

}
