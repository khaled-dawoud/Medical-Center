@extends('frontend.master')
@section('title' , 'Search Doctor | ' . env('APP_NAME'))
@section('content')
@section('styles')
<style>
    h1{
        padding-bottom: 200px;
        padding-top: 200px;
        color: red
    }
</style>
@stop
@if($doctors->isNotEmpty())
    @foreach ($doctors as $doctor)
    <div class="card">
        <div class="card-body">
            <div class="doctor-widget">
                <div class="doc-info-left">
                    <div class="doctor-img">
                        <a href="{{ route('site.doctor_details', $doctor->id) }}">
                            <img src="{{ asset('uploads/images/doctors/profile/'.$doctor->profile_image) }}" class="img-fluid" alt="User Image">
                        </a>
                    </div>
                    <div class="doc-info-cont">
                        <h4 class="doc-name"><a href="{{ route('site.doctor_details', $doctor->id) }}">{{ $doctor->name }}</a></h4>
                        <p class="doc-speciality">{{ $doctor->major }}</p>
                        <h5 class="doc-department">{{ $doctor->clinics->speciality_name }}</h5>
                        <div class="rating">
                            @php
                                $stars = round($doctor->review->avg('stars'), 0);
                                $count = 1;
                                $result = "";
                                for($i = 1; $i <= 5; $i++){
                                    if($stars >= $count){
                                        $result .= '<span><i class="fas fa-star filled"></i></span>';
                                    } else {
                                        $result .= '<span><i class="fas fa-star"></i></span>';
                                    }
                                    $count++;
                                }
                                echo $result;
                            @endphp
                            <span class="d-inline-block average-rating">({{ round($doctor->review->avg('stars'), 0) }})</span>
                        </div>
                        <div class="clinic-details">
                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="doc-info-right">
                    <div class="clini-infos">
                        <ul>
                            <li><i class="far fa-comment"></i>  </li>
                            <li><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</li>
                            <li><i class="far fa-money-bill-alt"></i> {{ $doctor->price }} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                        </ul>
                    </div>
                    <div class="clinic-booking">
                        <a class="view-pro-btn" href="{{ route('site.doctor_details', $doctor->id) }}">View Profile</a>
                        <a class="apt-btn" href="{{ route('site.book', $doctor->id) }}">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
<div>
    <h1 class="d-flex justify-content-center align-items-center">Not Found</h1>
</div>
@endif
@stop
