<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id')->withDefault();
    }

    public function review()
    {
        return $this->hasMany(Reviw::class);
    }

    public function appintments()
    {
        return $this->hasMany(Appointment::class);
    }

    function day()
    {
        return $this->hasMany(Day::class);
    }
}
