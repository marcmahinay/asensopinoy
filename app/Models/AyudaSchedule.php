<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyudaSchedule extends Model
{
    use HasFactory;

    protected $dates = ['schedule_date'];

    public function ayuda() {
        return $this->belongsTo(Ayuda::class);
    }
}
