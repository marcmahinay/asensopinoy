<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayuda extends Model
{
    use HasFactory;

    public function members() {
        return $this->belongsToMany(Member::class, 'ayuda_members')
                    ->withPivot('date_availed','amount','notes')
                    ->withTimestamps();
    }
}
