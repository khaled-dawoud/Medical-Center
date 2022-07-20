<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Awards;
use App\Models\Blog;
use App\Models\BlogDesc;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\DoctorDesc;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Featuer;
use App\Models\FeatuerDesc;
use App\Models\Reviw;
use App\Models\SearchDoctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index()
    {
        $search_doctor = SearchDoctor::findOrFail(1);
        $Speciality = Clinic::findOrFail(3);
        $Specialities = Clinic::take(5)->get();
        $clinic_featuer = Featuer::take(6)->get();
        $featuer_desc = FeatuerDesc::findOrFail(1);
        $doctor_desc = DoctorDesc::findOrFail(1);
        $doctors = Doctor::take(5)->get();
        $blog_desc = BlogDesc::FindOrFail(1);
        $blogs = Blog::take(4)->get();
        return view('frontend.index', compact('Specialities', 'Speciality', 'search_doctor', 'clinic_featuer', 'featuer_desc', 'doctor_desc', 'blog_desc', 'blogs', 'doctors'));
    }

    public function all_blogs()
    {
        $blogs = Blog::with('doctor')->take(10)->get();
        $latest_blogs = Blog::latest()->take(5)->get();
        return view('frontend.all_blogs', compact('blogs', 'latest_blogs'));
    }

    public function blog_details($id)
    {
        $blog = Blog::findOrFail($id);
        $latest_blogs = Blog::latest()->take(5)->get();
        return view('frontend.blod_details', compact('blog', 'latest_blogs'));
    }

    public function doctor_details($id)
    {
        $education = Education::where('doctor_id', $id)->get();
        $experiences = Experience::where('doctor_id', $id)->get();
        $awards = Awards::where('doctor_id', $id)->get();
        $doctor = Doctor::with('review')->findOrFail($id);
        return view('frontend.doctor_details', compact('doctor', 'education', 'experiences', 'awards'));
    }

    public function add_review(Request $request)
    {
        Reviw::create([
            'user_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'stars' => $request->stars,
            'commets' => $request->commets,
        ]);
        $notification = array(
            'message' => 'Review Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
