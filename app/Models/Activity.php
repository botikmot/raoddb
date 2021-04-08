<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'allotclass',
        'pap_id',
        'pap_name',
        'amount',
        'year'
    ];
}
