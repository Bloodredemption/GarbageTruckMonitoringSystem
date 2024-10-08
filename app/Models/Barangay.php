<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangays';

    protected $fillable = [
        'user_id',
        'name',
        'municipality',
        'province',
        'area',
        'zipcode',
        'captain',
    ];
}
