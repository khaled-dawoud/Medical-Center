<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::id());
        return view('backend.profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = User::findOrFail(Auth::id());
        return view('backend.edit_profile', compact('user'));
    }

    public function store_profile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->birth_date  = $request->birth_date;
        $data->mobile  = $request->mobile;
        $data->address  = $request->address;
        $data->description  = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/profile_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function update_password(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',

        ]);


        $hashPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashPassword)) {
            $users = User::find(Auth::id());
            $users->password = Hash::make($request->new_password);
            $users->save();

            $notification = array(
                'message' => 'Admin Password Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Old password is not match',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        };
    }
}
