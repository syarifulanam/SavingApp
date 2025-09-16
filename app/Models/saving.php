<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{

    protected $fillable = [
        'nama_nasabah',
        'type',
        'amount',
        'date',
    ];
}
