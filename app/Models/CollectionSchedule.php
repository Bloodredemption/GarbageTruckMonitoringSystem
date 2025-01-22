<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DumpTruck;
use App\Models\Barangay;
use App\Models\Users;

class CollectionSchedule extends Model
{
    use HasFactory;

    protected $table = 'collection_schedules';

    protected $fillable = [
        'user_id',
        'brgy_id',
        'dumptruck_id',
        'scheduled_date',
        'scheduled_time',
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }

    public function dumptruck()
    {
        return $this->belongsTo(Dumptruck::class, 'dumptruck_id');
    }

    public function driver()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

}
