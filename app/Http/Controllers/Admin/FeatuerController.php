<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Featuer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuers = Featuer::take(8)->get();
        return view('backend.featuer.index', compact('featuers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.featuer.create');
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
            'featuer_name' => 'required',
            'image' => 'required',
        ]);

        // upload the file
        $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/featuers'), $new_image);

        // Save data to database
        Featuer::create([
            'featuer_name' => $request->featuer_name,
            'image' => $new_image,
        ]);

        $notification = array(
            'message' => 'Featuer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.featuer.index')->with($notification);
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
        $featuer = Featuer::findOrFail($id);
        return view('backend.featuer.edit', compact('featuer'));
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
            'featuer_name' => 'required',
            'image' => 'nullable',
        ]);

        //old Image
        $featuers = Featuer::findOrFail($id);
        $new_image = $featuers->image;

        //chang image
        if ($request->hasFile('image')) {
            // upload the file
            $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/featuers'), $new_image);
        }

        // Save data to database
        $featuers->update([
            'featuer_name' => $request->featuer_name,
            'image' => $new_image,
        ]);

        $notification = array(
            'message' => 'Featuer Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.featuer.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $featuers = Featuer::findOrFail($id);
        //Delete Image
        if (file_exists(public_path('uploads/images/featuers' . $featuers->image))) {
            File::delete(public_path('uploads/images/featuers' . $featuers->image));
        }

        //Delete Item
        $featuers->delete();
        $notification = array(
            'message' => 'Featuer Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.featuer.index')->with($notification);
    }
}
