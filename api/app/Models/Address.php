<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'cep',
        'logradouro',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];
}
