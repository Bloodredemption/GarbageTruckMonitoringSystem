<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentsConcerns extends Model
{
    use HasFactory;

    protected $table = 'residents_concerns';

    protected $fillable = [
        'complaint_type',
        'fullname',
        'contact_num',
        'brgy_location',
        'complaint_subject',
        'complaint_details',
        'dateOfIncident',
        'attachments',
    ];

}
