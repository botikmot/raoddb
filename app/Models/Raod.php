<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raod extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'serial',
        'office',
        'allotclass',
        'pap',
        'activity',
        'uacscode',
        'name',
        'particular',
        'obligation',
        'disbursement',
        'status',
        'date'
    ];
}
