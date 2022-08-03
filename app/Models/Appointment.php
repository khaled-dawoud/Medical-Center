<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function doctors()
    {
        return $this->belongsTo(Doctor::class)->withDefault();
    }
    public function days()
    {
        return $this->belongsTo(days::class)->withDefault();
    }
}
