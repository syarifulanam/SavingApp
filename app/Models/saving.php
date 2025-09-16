<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_nasabah',
        'type',
        'amount',
        'date',
    ];
}
