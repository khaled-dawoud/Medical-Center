<?php

namespace App\Http\Controllers;

use App\Models\DoctorDesc;
use Illuminate\Http\Request;

class DoctorDescController extends Controller
{
    public function doctor_description()
    {
        $doctor_desc = DoctorDesc::findOrFail(1);
        return view('backend.doctor_desc.edit', compact('doctor_desc'));
    }

    public function doctor_description_update()
    {
    }
}
