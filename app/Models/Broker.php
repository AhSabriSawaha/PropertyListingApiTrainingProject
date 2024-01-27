<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'zip_code', 'city', 'address', 'logo_path', 'phone_number'
    ];
}
