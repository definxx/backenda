<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sharespace extends Model
{
    use HasFactory;

    protected $fillable = [
        'sharespace_user_id',
        'sharespace_user_title',
        'sharespace_user_price',
        'sharespace_user_address',
        'sharespace_user_location',
        'sharespace_user_description',
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'sharespace_user_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'sharespace_id'); // Updated to use 'sharespace_id'
    }
    public function booking(){
        return $this->hasmany(Booking::class,'sharespace_id');
    }
}
