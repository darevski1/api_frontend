<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\
class Bucket extends Model
{
    use HasFactory;
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}