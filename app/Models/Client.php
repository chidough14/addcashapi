<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
