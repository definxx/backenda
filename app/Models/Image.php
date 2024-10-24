<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'sharespace_id', // Updated to use 'sharespace_id'
        'path',
    ];

    public function sharespace()
    {
        return $this->belongsTo(Sharespace::class, 'sharespace_id'); // Updated to use 'sharespace_id'
    }
}
