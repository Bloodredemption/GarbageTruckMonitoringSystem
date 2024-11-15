<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteConversion extends Model
{
    use HasFactory;

    protected $table = 'waste_conversions';

    protected $fillable = [
        'user_id',
        'waste_type',
        'conversion_method',
        'metrics',
        'total_converted',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

}
