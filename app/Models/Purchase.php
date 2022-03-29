<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'stock_id',
        'volume',
        'purchase_price'
    ];


    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }
}
