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
        'waste_comp_id',
        'conversion_method',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function waste_comp()
    {
        return $this->belongsTo(WasteComposition::class, 'waste_comp_id');
    }
}
