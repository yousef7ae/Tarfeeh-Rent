<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso2',
        'iso3',
        'status',
        'phone_code',
        'subregion',
        'region',
    ];
}
