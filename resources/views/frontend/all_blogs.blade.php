@extends('frontend.master')
@section('title' , 'All Blogs| ' . env('APP_NAME'))
    <!-- Main Wrapper -->
@section('content')
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blogs</h2>
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

							<div class="row blog-grid-row">

								@foreach ( $blogs as $blog)
                                    <div class="col-md-6 col-sm-12">

                                        <!-- Blog Post -->
                                        <div class="blog grid-blog">
                                            <div class="blog-image">
                                                <a href="{{ route('site.blog_details', $blog->id) }}"><img class="img-fluid" src="{{ asset('uploads/images/blogs/'.$blog->image) }}" alt="Post Image"></a>
                                            </div>
                                            <div class="blog-content">
                                                <ul class="entry-meta meta-item">
                                                    <li>
                                                        <div class="post-author">
                                                            <a href="{{ route('site.doctor_details', $blog->doctor->id) }}"><img src="{{ asset('uploads/images/doctors/'.$blog->doctor->image) }}" alt="Post Author"> <span>{{ $blog->doctor->name }}</span></a>
                                                        </div>
                                                    </li>
                                                    <li><i class="far fa-clock"></i>{{ $blog->created_at->format('d M,Y') }}</li>
                                                </ul>
                                                <h3 class="blog-title"><a href="{{ route('site.blog_details', $blog->id) }}">{{ $blog->title }}</a></h3>
                                                <p class="mb-0">{{ $blog->short_desc }}</p>
                                            </div>
                                        </div>
                                        <!-- /Blog Post -->

                                    </div>
                                @endforeach

							</div>

							<!-- Blog Pagination -->
							{{-- <div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
										<nav>
											<ul class="pagination justify-content-center">
												<li class="page-item disabled">
													<a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#">1</a>
												</li>
												<li class="page-item active">
													<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#">3</a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div> --}}
							<!-- /Blog Pagination -->

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
