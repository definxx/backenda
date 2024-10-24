<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_user_id',
        'profile_user_pic',
        'profile_user_state',
        'profile_user_town',
        'profile_user_postal_code',
        'profile_user_country',
        'profile_user_date_of_birth',
        'profile_user_address',
        'profile_user_bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'profile_user_id');
    }
}
