<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DumpTruck extends Model
{
    use HasFactory;

    protected $table = 'dump_trucks';

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function driver()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
