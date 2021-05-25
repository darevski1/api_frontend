<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Location;

class Bucket extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location_name'];  
//     public function location()
//     {
//         return $this->hasOne(Location::class);
//     }
}
