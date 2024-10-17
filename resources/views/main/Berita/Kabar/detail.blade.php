@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Kabar</span>
                    Detail
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="blog-details-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="course-details">
                        <div class="cs-thumb mb-5">
                            <img src="{{ asset('assets/media/images/blog/blog-details.jpg') }}" class="w-100"
                                alt="image">
                        </div>
                        <div class="cs-content">
                            <div class="blog-top-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>By <span>Sajib</span></li>
                                    <li><i class="fa fa-tag"></i> CSE , GMAT</li>
                                    <li><i class="fa fa-comment-o"></i>(3) <span>Comments</span></li>
                                </ul>
                            </div>
                            <h3 class="mb-4"><a href="#">Excepteur sint occaecat cupidatat non proident </a></h3>

                            <p class="text-justify">
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                numquam eius modi tempora incidunt ut labore et dolore voluptatem.</p>
                            <p class="text-justify">
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste
                                natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                                enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                                dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius
                                modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
