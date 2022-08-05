@extends('frontend.master')
@section('title' , 'Dashboard | ' . env('APP_NAME'))
@section('content')
    <div class="main-wrapper">
                <!-- Home Banner -->
                <section class="section section-search">
                    <div class="container-fluid">
                        <div class="banner-wrapper">
                            <div class="banner-header text-center">
                                <h1>{{ $search_doctor->title }}</h1>
                                <p>{{ $search_doctor->description }}</p>
                            </div>

                            <!-- Search -->
                            <div class="search-box d-flex justify-content-center">
                                <form action="{{ route('search') }}"  method="GET">
                                @csrf
                                    <div class="form-group search-info">
                                        <input type="text" class="form-control" placeholder="Search Doctors" name="search">
                                        <span class="form-text">Ex : Dental or Sugar Check up etc</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                                </form>
                        </div>
                    </div>
                </section>
                <!-- /Home Banner -->

                <!-- Clinic and Specialities -->
                <section class="section section-specialities">
                    <div class="container-fluid">
                        <div class="section-header text-center">
                            <h2>{{ $Speciality->title }}</h2>
                            <p class="sub-title">{{ $Speciality->description }}</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <!-- Slider -->
                                <div class="specialities-slider slider">

                                    @foreach ( $Specialities as $item)
                                        <!-- Slider Item -->
                                        <div class="speicality-item text-center">
                                            <div class="speicality-img">
                                                <a href="{{ route('site.clinic_doctor', $item->id) }}">
                                                    <img src="{{ asset('uploads/images/clinics/'.$item->image) }}" class="img-fluid" alt="Speciality">
                                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </a>
                                            </div>
                                            <p>{{ $item->speciality_name }}</p>
                                        </div>
                                        <!-- /Slider Item -->
                                    @endforeach

                                </div>
                                <!-- /Slider -->

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Clinic and Specialities -->

                <!-- Popular Section -->
                <section class="section section-doctor">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-lg-4">
                                <div class="section-header ">
                                    <h2>{{ $doctor_desc->title }}</h2>
                                    {{-- <p>Lorem Ipsum is simply dummy text </p> --}}
                                </div>
                                <div class="about-content">
                                    <p>{{ $doctor_desc->desc }}</p>
                                    <a href="{{ route('site.all_doctors') }}">See More..</a>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="doctor-slider slider">

                                    @foreach ($doctors as $doctor)
                                        <!-- Doctor Widget -->
                                        <div class="profile-widget">
                                            <div class="doc-img">
                                                <a href="{{ route('site.doctor_details', $doctor->id) }}">
                                                    <img class="img-fluid" alt="User Image" src="{{ asset('uploads/images/doctors/'.$doctor->image) }}">
                                                </a>
                                            </div>
                                            <div class="pro-content">
                                                <h3 class="title">
                                                    <a href="{{ route('site.doctor_details', $doctor->id) }}">{{ $doctor->name }}</a>
                                                    <i class="fas fa-check-circle verified"></i>
                                                </h3>
                                                <p class="speciality">{{ $doctor->major }}</p>
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
                                                    <span class="d-inline-block average-rating">({{  round($doctor->review->avg('stars'), 0) }})</span>
                                                </div>
                                                <ul class="available-info">
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}
                                                    </li>
                                                    <li>
                                                        <i class="far fa-clock"></i> {{ $doctor->available }}
                                                    </li>
                                                    <li>
                                                        <i class="far fa-money-bill-alt"></i> ${{ $doctor->price }}
                                                    </li>
                                                </ul>
                                                <div class="row row-sm">
                                                    <div class="col-6">
                                                        <a href="{{ route('site.doctor_details', $doctor->id) }}" class="btn view-btn">View Profile</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{ route('site.book',$doctor->id ) }}" class="btn book-btn">Book Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Doctor Widget -->
                                    @endforeach

                                </div>
                            </div>
                    </div>
                    </div>
                </section>
                <!-- /Popular Section -->

            <!-- Availabe Features -->
            <section class="section section-features">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-5 features-img">
                                <img src="{{ asset('uploads/images/featuer_desc/'.$featuer_desc->image) }}" class="img-fluid" alt="Feature">
                            </div>
                            <div class="col-md-7">
                                <div class="section-header">
                                    <h2 class="mt-2">{{ $featuer_desc->title }}</h2>
                                    <p>{{ $featuer_desc->description }}</p>
                                </div>
                                <div class="features-slider slider">
                                    @foreach ( $clinic_featuer as $featuer )
                                        <div class="feature-item text-center">
                                            <img src="{{ asset('uploads/images/featuers/'.$featuer->image) }}" class="img-fluid" alt="Feature">
                                            <p>{{ $featuer->featuer_name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                    </div>
                    </div>
                </section>
                <!-- /Availabe Features -->

                <!-- Blog Section -->
            <section class="section section-blogs">

                    <div class="container-fluid">

                        <!-- Section Header -->
                        <div class="section-header text-center">
                            <h2>{{ $blog_desc->title }}</h2>
                            <p class="sub-title">{{ $blog_desc->description }}</p>
                        </div>
                        <!-- /Section Header -->

                        <div class="row blog-grid-row">

                            @foreach ( $blogs as $blog)

                                <div class="col-md-6 col-lg-3 col-sm-12">
                                    <!-- Blog Post -->
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="{{ route('site.blog_details', $blog->id) }}"><img class="img-fluid" src="{{ asset('uploads/images/blogs/'.$blog->image) }}" alt="Post Image"></a>
                                        </div>
                                        <div class="blog-content">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <a href="{{ route('site.doctor_details', $doctor->id) }}"><img src="{{ asset('uploads/images/doctors/'.$blog->doctor->image) }}" alt="Post Author"> <span>{{ $blog->doctor->name }}</span></a>
                                                    </div>
                                                </li>
                                                <li><i class="far fa-clock"></i> {{ $blog->created_at->format('d M,Y') }}</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="{{ route('site.blog_details', $blog->id) }}">{{ $blog->title }}</a></h3>
                                            <p class="mb-0">{{ $blog->short_desc }}</p>
                                        </div>
                                    </div>
                                    <!-- /Blog Post -->
                                </div>

                            @endforeach

                        </div>
                        <div class="view-all text-center">
                            <a href="{{ route('site.all_blogs') }}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </section>
                <!-- /Blog Section -->
    </div>
@stop


