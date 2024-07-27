<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    public function municity() {
        return $this->belongsTo(Municity::class);
    }

    public function members() {
        return $this->hasMany(Member::class);
    }
}
