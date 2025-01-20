<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentsConcerns extends Model
{
    use HasFactory;

    protected $table = 'residents_concerns';

    protected $fillable = [
        'fullname',
        'contact_num',
        'address',
        'complaint_details',
        'dateOfIncident',
        'remarks',
        'status',
    ];

    protected $casts = [
        'attachments' => 'array', // Automatically cast attachments to an array
    ];
}
