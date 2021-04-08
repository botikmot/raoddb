<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'allotclass',
        'pap_id',
        'pap_name',
        'activity',
        'office',
        'status',
        'amount',
        'year'
    ];

    public function transfer()
    {
        return $this->belongsTo(PersonalServices::class, 'pap_id');
    }

}
