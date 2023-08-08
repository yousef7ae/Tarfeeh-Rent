<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name','image','description','service_category_id','country_id','city_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
