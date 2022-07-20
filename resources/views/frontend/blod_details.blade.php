@extends('frontend.master')
@section('title' , 'All Blogs| ' . env('APP_NAME'))
@section('content')
		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('site.all_blogs') }}">Blogs</a></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog Details</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<a href="javascript:void(0);"><img alt="" src="{{ asset('uploads/images/blogs/'.$blog->image) }}" class="img-fluid"></a>
									</div>
									<h3 class="blog-title">{{ $blog->title }}h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
														<a href="{{ route('site.doctor_details', $blog->doctor->id) }}"><img src="{{ asset('uploads/images/doctors/'.$blog->doctor->image) }}" alt="Post Author"> <span>{{ $blog->doctor->name }}</span></a>
													</div>
												</li>
												<li><i class="far fa-calendar"></i>{{ $blog->created_at->format('d M,Y') }}</li>
												<li><i class="fa fa-tags"></i>{{ $blog->doctor->clinics->speciality_name }}</li>
											</ul>
										</div>
									</div>
									<div class="blog-content">
										<p>{{ $blog->long_desc }}</p>
									</div>
								</div>

								<div class="card author-widget clearfix">
								<div class="card-header">
									<h4 class="card-title">About Author</h4>
									</div>
								<div class="card-body">
									<div class="about-author">
										<div class="about-author-img">
											<div class="author-img-wrap">
												<a href="doctor-profile.html"><img class="img-fluid rounded-circle" alt="" src="{{ asset('uploads/images/doctors/'.$blog->doctor->image) }}"></a>
											</div>
										</div>
										<div class="author-details">
											<a href="doctor-profile.html" class="blog-author-name">{{ $blog->doctor->name }}</a>
											<p class="mb-0">{{ $blog->doctor->about_me }}</p>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>

						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
										@foreach ($latest_blogs as $latest)
                                            <li>
                                                <div class="post-thumb">
                                                    <a href="{{ route('site.blog_details', $latest->id) }}">
                                                        <img class="img-fluid" src="{{ asset('uploads/images/blogs/'.$latest->image) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h4>
                                                        <a href="{{ route('site.blog_details', $latest->id) }}">{{ $latest->title }}</a>
                                                    </h4>
                                                    <p>{{ $blog->created_at->format('d M,Y') }}</p>
                                                </div>
                                            </li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

						</div>
						<!-- /Blog Sidebar -->

                </div>
				</div>

			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->
@stop
