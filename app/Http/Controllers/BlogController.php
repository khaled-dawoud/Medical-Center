<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogDesc;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Comment\Doc;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('doctor')->take(8)->get();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::select('id', 'speciality_name')->get();
        $doctors = Doctor::select('id', 'name')->get();
        return view('backend.blog.create', compact('clinics', 'doctors'));
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
            'image' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'clinic_id' => 'required',
            'doctor_id' => 'required'
        ]);

        // upload the file
        $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/blogs'), $new_image);

        // Save data to database
        Blog::create([
            'title' => $request->title,
            'image' => $new_image,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'clinic_id' => $request->clinic_id,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinics = Clinic::select('id', 'speciality_name')->get();
        $doctors = Doctor::select('id', 'name')->get();
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('blog', 'clinics', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate input
        $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'clinic_id' => 'required',
            'doctor_id' => 'required'
        ]);

        //old Image
        $blogs = Blog::findOrFail($id);
        $new_image = $blogs->image;

        //chang image
        if ($request->hasFile('image')) {
            // upload the file
            $new_image = rand() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/blogs'), $new_image);
        }

        // Save data to database
        $blogs->update([
            'title' => $request->title,
            'image' => $new_image,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'clinic_id' => $request->clinic_id,
            'doctor_id' => $request->doctor_id
        ]);

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blogs = Blog::findOrFail($id);
        //Delete Image
        if (file_exists(public_path('uploads/images/blogs/' . $blogs->image))) {
            File::delete(public_path('uploads/images/blogs/' . $blogs->image));
        }

        //Delete Item
        $blogs->delete();
        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.blog.index')->with($notification);
    }


    public function blog_description()
    {
        $blog_desc = BlogDesc::findOrFail(1);
        return view('backend.blog.edit_desc', compact('blog_desc'));
    }

    public function blog_description_update(Request $request)
    {
        $id = $request->id;

        BlogDesc::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Blog Description Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
