<?php

namespace App\Models;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

//     protected $fillable  = [
//        'name' , 'description' , 'image' , 'file' , 'url_video' , 'from_date' ,
//         'date_expire' , 'address','status',
//         'num_phone','price1','user_id','service_id','country_id','city_id'
//     ];

    static function statusList($status = "")
    {
        $array = [
            0 => __('InActive'),
            1 => __('Active'),
        ];

        if ($status === false) {
            return $array;
        }

        if (array_key_exists($status, $array)) {
            return $array[$status];
        }

        return $array;
    }

    public function getReservationCounterAttribute()
    {
        $date_expire = Carbon::parse($this->date_expire);
        $from_date = Carbon::parse($this->from_date);

        return  $date_expire->diffInDays($from_date) > 0 ? $date_expire->diffInDays($from_date) : 0;
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function product_reservation_times()
    {
        return $this->hasMany(ProductReservationTime::class , 'product_id');
    }
}
