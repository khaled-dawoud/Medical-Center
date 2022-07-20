<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Clinic::paginate(6);
        return view('backend.clinic.index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clinic.create');
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
            'title' => 'required',
            'speciality_name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // upload the file
        $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/clinics'), $new_image);

        // Save data to database
        Clinic::create([
            'title' => $request->title,
            'speciality_name' => $request->name,
            'description' => $request->description,
            'image' => $new_image,
        ]);

        $notification = array(
            'message' => 'Clinic Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.speciality.index')->with($notification);
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
        $speciality = Clinic::findOrFail($id);
        return view('backend.clinic.edit', compact('speciality'));
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
            'title' => 'required',
            'speciality_name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        //old Image
        $speciality = Clinic::findOrFail($id);
        $new_image = $speciality->image;

        //chang image
        if ($request->hasFile('image')) {
            // upload the file
            $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/clinics'), $new_image);
        }

        // Save data to database
        $speciality->update([
            'title' => $request->title,
            'speciality_name' => $request->name,
            'description' => $request->description,
            'image' => $new_image,
        ]);

        $notification = array(
            'message' => 'Speciality Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.speciality.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speciality = Clinic::findOrFail($id);
        //Delete Image
        if (file_exists(public_path('uploads/images/clinics' . $speciality->image))) {
            File::delete(public_path('uploads/images/clinics' . $speciality->image));
        }

        //Delete Item
        $speciality->delete();
        $notification = array(
            'message' => 'Speciality Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.speciality.index')->with($notification);
    }
}
