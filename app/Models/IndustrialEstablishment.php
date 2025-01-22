<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Barangay;

class IndustrialEstablishment extends Model
{
    use HasFactory;

    protected $table = 'industrial_establishments';

    protected $fillable = [
        'name', 
        'brgy_id', 
        'type', 
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }
}
