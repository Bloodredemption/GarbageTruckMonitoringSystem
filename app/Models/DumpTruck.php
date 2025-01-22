<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class DumpTruck extends Model
{
    use HasFactory;

    protected $table = 'dump_trucks';

    protected $fillable = [
        'brand',
        'model',
        'status',
    ];

    public function driver()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
