<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatuerDesc;
use Illuminate\Http\Request;
use Image;

class FeatuerDescController extends Controller
{
    public function featuer_description()
    {
        $featuer_desc = FeatuerDesc::findOrFail(1);
        return view('backend.featuer.featuer_description', compact('featuer_desc'));
    }

    public function featuer_description_update(Request $request)
    {
        $id = $request->id;

        if ($request->file('image')) {
            $new_image = $request->file('image');
            $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/featuer_desc'), $new_image);

            FeatuerDesc::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $new_image
            ]);
            $notification = array(
                'message' => 'Featuer Section Updated with Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } else {
            FeatuerDesc::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            $notification = array(
                'message' => 'Featuer Section Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
