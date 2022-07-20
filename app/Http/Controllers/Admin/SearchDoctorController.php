<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchDoctor;
use Illuminate\Http\Request;

class SearchDoctorController extends Controller
{
    public function Search_Doctor()
    {
        $search_doctor = SearchDoctor::findOrFail(1);
        return view('backend.search_doctor.edit', compact('search_doctor'));
    }

    public function Search_Doctor_update(Request $request)
    {
        $id = $request->id;

        SearchDoctor::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Search Doctor Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
