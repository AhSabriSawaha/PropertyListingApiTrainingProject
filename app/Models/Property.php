<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\AssignThisVariablePass;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'broker_id', 'address', 'listing_type', 'city', 'zip_code', 'description', 'build_year'
    ];
    public function carateristic() {
        return $this->hasOne(PropertyCharacteristic::class);
    }
}
