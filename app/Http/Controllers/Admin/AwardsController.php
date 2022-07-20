<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Awards;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards = Awards::all();
        return view('backend.award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.award.create', compact('doctors'));
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
            'date' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'doctor_id' => 'required'
        ]);
        // Save data to database
        Awards::create([
            'date' => $request->date,
            'title' => $request->title,
            'desc' => $request->desc,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Awards Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.award.index')->with($notification);
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
        $award = Awards::findOrFail($id);
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.award.edit', compact('doctors', 'award'));
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
            'date' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'doctor_id' => 'required'
        ]);

        $award = Awards::findOrFail($id);

        // Save data to database
        $award->update([
            'date' => $request->date,
            'title' => $request->title,
            'desc' => $request->desc,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Awards Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.award.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $award = Awards::findOrFail($id);
        $award->delete();
        $notification = array(
            'message' => 'Awards Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.award.index')->with($notification);
    }
}
