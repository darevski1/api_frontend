<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bucket;
class Location extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function bucket()
    {
        return $this->hasOne(Bucket::class);
    }
}
