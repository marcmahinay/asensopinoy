<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municity extends Model
{
    use HasFactory;

    public function barangays()
    {
        return $this->hasMany(Barangay::class);
    }
}
