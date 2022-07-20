<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::paginate(8);
        return view('backend.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.education.create', compact('doctors'));
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
            'uni_name' => 'required',
            'uni_major' => 'required',
            'end' => 'required',
            'start' => 'required',
            'doctor_id' => 'required'
        ]);
        // Save data to database
        Education::create([
            'uni_name' => $request->uni_name,
            'uni_major' => $request->uni_major,
            'end' => $request->end,
            'start' => $request->start,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Educatio Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.education.index')->with($notification);
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
        $education = Education::findOrFail($id);
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.education.edit', compact('doctors', 'education'));
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
            'uni_name' => 'required',
            'uni_major' => 'required',
            'start' => 'required',
            'end' => 'required',
            'doctor_id' => 'required'
        ]);

        $education = Education::findOrFail($id);

        // Save data to database
        $education->update([
            'uni_name' => $request->uni_name,
            'uni_major' => $request->uni_major,
            'end' => $request->end,
            'start' => $request->start,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Educatio Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.education.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        //Delete Item
        $education->delete();
        $notification = array(
            'message' => 'Education Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.education.index')->with($notification);
    }
}
