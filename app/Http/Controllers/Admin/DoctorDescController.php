<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorDesc;
use Illuminate\Http\Request;

class DoctorDescController extends Controller
{
    public function doctor_description()
    {
        $doctor_desc = DoctorDesc::findOrFail(1);
        return view('backend.doctor.edit', compact('doctor_desc'));
    }

    public function doctor_description_update(Request $request)
    {
        $id = $request->id;

        DoctorDesc::findOrFail($id)->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        $notification = array(
            'message' => 'Doctor Description Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
