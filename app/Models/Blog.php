<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class)->withDefault();
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class)->withDefault();
    }
}
