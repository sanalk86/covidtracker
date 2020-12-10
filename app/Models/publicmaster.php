<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicmaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'otp',
        'phone_number',
    ];
}
