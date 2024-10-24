<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertyowner extends Model
{
    use HasFactory;
    const STATUS_PROCESSING = 'processing';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';
    protected $fillable = [
        'propertyowner_user_id', 
        'propertyowner_user_nin_no', 
        'propertyowner_user_state', 
        'propertyowner_user_address', 
        'propertyowner_user_lga', 
        'propertyowner_user_status', 
        'propertyowner_user_nin_image', 
        'propertyowner_user_profile_picture'
    ];

    protected $attributes = [
        'status' => self::STATUS_PROCESSING,
    ];
}
