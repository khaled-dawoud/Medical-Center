<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Awards;
use App\Models\Blog;
use App\Models\BlogDesc;
use App\Models\Booked;
use App\Models\Clinic;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\DoctorDesc;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Featuer;
use App\Models\FeatuerDesc;
use App\Models\Reviw;
use App\Models\SearchDoctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index()
    {
        $search_doctor = SearchDoctor::findOrFail(1);
        $Speciality = Clinic::findOrFail(1);
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
        $doctor = Doctor::with('review')->findOrFail($id);
        $reviews = Reviw::with('user')->where('doctor_id', $id)->OrderByDesc("id")->take(4)->get();
        $services = Service::where('doctor_id', $id)->get();
        return view('frontend.doctor_details', compact('doctor', 'education', 'experiences', 'reviews', 'services'));
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

    public function book($id)
    {
        $paymentDate = '05/06/2021';
        $day = Carbon::createFromFormat('d/m/Y', $paymentDate)->format('l');
        $doctor = Doctor::FindOrFail($id);
        $days = Day::select('id', 'name')->get();
        $apps = Appointment::with('doctors')->where('doctor_id', $id)->get();
        return view('frontend.booking', compact('doctor', 'day', 'days', 'apps'));
    }

    public function all_doctors()
    {
        $reviews = Reviw::select('id', 'commets')->get();
        $doctors = Doctor::with('clinics', 'review')->take(10)->get();
        return view('frontend.all_doctors', compact('doctors', 'reviews'));
    }




    public function clinic_doctor($id)
    {
        $reviews = Reviw::select('id', 'commets')->get();
        $doctors = Doctor::with('clinics', 'review')->where('clinic_id', $id)->get();
        return view('frontend.clinic_doctor', compact('doctors'));
    }




    public function checkout($id, $start, $end, $day)
    {
        $doctor = Doctor::findOrFail($id);
        $price = $doctor->price;
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=$price" .
            "&currency=USD" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData =  json_decode($responseData, true);
        $checkoutId = $responseData['id'];
        // $start_time = Appointment::where('doctor_id', $id)->where('day_id', $day)->get();
        // return ($start_time);
        return view('frontend.checkout', compact('doctor', 'checkoutId', 'start', 'end', 'day'));
    }





    public function checkout_thanks($id, $start, $end, $day)
    {
        $resourcePath = request()->resourcePath;
        $url = "https://eu-test.oppwa.com/$resourcePath";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        // dd(json_decode($responseData, true));
        $responseData = json_decode($responseData, true);
        if ($responseData['result']['code'] == '000.100.110') {
            // dd('add to booked table with thanks page');
            $booked = Booked::create([
                'user_id' => Auth::id(),
                'doctor_id' => $id,
                'price' => $responseData['amount'],
                'transaction_id' => $responseData['id'],
                'time_start' => $start,
                'time_end' => $end,
            ]);

            $app = Appointment::with('doctor')->where('doctor_id', $id)->where('day_id', $day)->where('start_time', $start)->where('end_time', $end);
            $app->delete();

            $notification = array(
                'message' => 'Payment Completed Successfully, Thank You',
                'alert-type' => 'success'
            );
            return redirect()->route('site.index')->with($notification);
        } else {
            $notification = array(
                'message' => 'Payment Incompleted',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
