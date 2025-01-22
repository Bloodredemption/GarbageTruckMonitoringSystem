<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Users;

class Messages extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'user_id', 
        'receiver_id', 
        'message', 
        'is_read'
    ];

    public function receiver()
    {
        return $this->belongsTo(Users::class, 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
