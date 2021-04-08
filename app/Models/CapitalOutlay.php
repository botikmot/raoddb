<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalOutlay extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year',
        'amount'
    ];

    public function transfer()
    {
        return $this->hasMany(FundTransfer::class, 'pap_id')->where('fund_transfers.allotclass', '=', 'CO');
    }
}
