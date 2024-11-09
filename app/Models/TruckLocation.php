<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckLocation extends Model
{
    use HasFactory;

    protected $table = 'truck_locations';

    protected $fillable = [
        'user_id',
        'truck_id',
        'latitude',
        'longitude',
    ];
}
