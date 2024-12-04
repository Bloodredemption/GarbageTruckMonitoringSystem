<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WasteAnalysis extends Model
{
    use HasFactory;

    protected $table = 'waste_analysis';

    protected $fillable = [
        'brgy_id', 
        'event_id', 
    ];
}
