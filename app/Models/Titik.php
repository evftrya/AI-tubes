<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'posisi_x',
        'posisi_y',
        'x1',
        'y1',
        'x2',
        'y2'
    ];
}
