<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZooLocation extends Model
{
    protected $table = 'zoo_locations';
    protected $fillable = ['name'];
}
