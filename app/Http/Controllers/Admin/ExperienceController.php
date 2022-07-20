<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::all();
        return view('backend.experience.index', compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.experience.create', compact('doctors'));
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
            'place' => 'required',
            'period' => 'required',
            'doctor_id' => 'required'
        ]);
        // Save data to database
        Experience::create([
            'place' => $request->place,
            'period' => $request->period,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Experience Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.experience.index')->with($notification);
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
        $experience = Experience::findOrFail($id);
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.experience.edit', compact('doctors', 'experience'));
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
            'place' => 'required',
            'period' => 'required',
            'doctor_id' => 'required'
        ]);

        $experience = Experience::findOrFail($id);
        // Save data to database
        $experience->update([
            'place' => $request->place,
            'period' => $request->period,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Experience Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.experience.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        $notification = array(
            'message' => 'Experience Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.experience.index')->with($notification);
    }
}
