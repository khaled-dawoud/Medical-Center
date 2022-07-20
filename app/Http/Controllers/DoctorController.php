<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with('clinics')->paginate(5);
        return view('backend.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::select('id', 'speciality_name')->get();
        return view('backend.doctor.create', compact('clinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'image' => 'required',
            'profile_image' => 'required',
            'price' => 'required',
            'address' => 'required',
            'available' => 'required',
            'clinic_id' => 'required',
            'about_me' => 'required',
            'clinic_center' => 'required',
            'clinic_major' => 'required',
            'clinic_address' => 'required',
        ]);

        // upload the img
        $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/doctors'), $new_image);

        // upload the profile img
        $profile_image = rand() . rand() . $request->file('profile_image')->getClientOriginalName();
        $request->file('profile_image')->move(public_path('uploads/images/doctors/profile'), $profile_image);


        // Save data to database
        Doctor::create([
            'name' => $request->name,
            'major' => $request->major,
            'image' => $new_image,
            'profile_image' => $profile_image,
            'price' => $request->price,
            'address' => $request->address,
            'available' => $request->available,
            'clinic_id' => $request->clinic_id,
            'about_me' => $request->about_me,
            'clinic_center' => $request->clinic_center,
            'clinic_major' => $request->clinic_major,
            'clinic_address' => $request->clinic_address,
        ]);

        $notification = array(
            'message' => 'Doctor Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.doctor.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinics = Clinic::select('id', 'speciality_name')->get();
        $doctor = Doctor::findOrFail($id);
        return view('backend.doctor.edit', compact('doctor', 'clinics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate input
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'image' => 'nullable',
            'profile_image' => 'nullable',
            'price' => 'required',
            'address' => 'required',
            'available' => 'required',
            'clinic_id' => 'required',
            'about_me' => 'required',
            'clinic_center' => 'required',
            'clinic_major' => 'required',
            'clinic_address' => 'required',
        ]);


        // old Image
        $doctor = Doctor::findOrFail($id);
        $new_image = $doctor->image;
        $profile_image = $doctor->profile_image;

        //chang image
        if ($request->hasFile('image')) {
            // upload the file
            $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/doctors'), $new_image);
        }
        //chang profile image
        if ($request->hasFile('profile_image')) {
            // upload the file
            $profile_image = rand() . rand() . $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(public_path('uploads/images/doctors/profile'), $profile_image);
        }

        // Save data to database
        $doctor->update([
            'name' => $request->name,
            'major' => $request->major,
            'image' => $new_image,
            'profile_image' => $profile_image,
            'price' => $request->price,
            'address' => $request->address,
            'available' => $request->available,
            'clinic_id' => $request->clinic_id,
            'about_me' => $request->about_me,
            'clinic_center' => $request->clinic_center,
            'clinic_major' => $request->clinic_major,
            'clinic_address' => $request->clinic_address,
        ]);


        $notification = array(
            'message' => 'Doctor Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.doctor.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        //Delete Image
        if (file_exists(public_path('uploads/images/doctors/' . $doctor->image))) {
            File::delete(public_path('uploads/images/doctors/' . $doctor->image));
        }

        //Delete Profile Image
        if (file_exists(public_path('uploads/images/doctors/profile/' . $doctor->profile_image))) {
            File::delete(public_path('uploads/images/doctors/profile/' . $doctor->profile_image));
        }

        //Delete Item
        $doctor->delete();
        $notification = array(
            'message' => 'Doctor Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.doctor.index')->with($notification);
    }
}
