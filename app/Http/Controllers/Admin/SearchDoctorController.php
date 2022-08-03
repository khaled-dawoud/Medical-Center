<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
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

    public function search()
    {
        $search = request()->input('search');
        if (!empty($search)) {
            $doctors = Doctor::query()
                ->where('name', 'LIKE', "%{$search}%")->get();
            return view('frontend.search', compact('doctors'));
        } else {
            return redirect()->back();
        }
    }
}
