<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    const STATUS_PROCESSING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';

    protected $fillable = [
        'sharespace_id',
        'booker_id',
        'status',
        'check_in',
        'check_out',
        'number_of_guests',
        'special_requests'
    ];

    protected $attributes = [
        'status' => self::STATUS_PROCESSING,
    ];

    protected $dates = [
        'check_in',
        'check_out'
    ];

    public function sharespace()
    {
        return $this->belongsTo(Sharespace::class, 'sharespace_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'booker_id');
    }
    
}
