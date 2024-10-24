<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'host_id', 'message'];

    // The user who sent the message
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The host who received the message
    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }
}
