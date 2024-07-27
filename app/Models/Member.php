<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function barangay() {
        return $this->belongsTo(Barangay::class);
    }

    public function ayudas() {
        return $this->belongsToMany(Ayuda::class, 'ayuda_members')
                    ->withPivot('date_availed', 'amount', 'notes')
                    ->withTimestamps();
    }
}
