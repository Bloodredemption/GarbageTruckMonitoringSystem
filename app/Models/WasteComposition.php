<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Barangay;

class WasteComposition extends Model
{
    use HasFactory;

    protected $table = 'waste_compositions';

    protected $fillable = [
        'user_id',
        'brgy_id',
        'event_id',
        'waste_type',
        'collection_date',
        'metrics',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function brgy()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }
}
