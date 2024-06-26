{{-- admin layout importated --}}
<x-adminLayout>
    {{-- <section class="hero-section">
        @if (DB::table('heroes')->count() > 1)
        <div class="container text-center">
            @if (Session('success'))
            <div class="alert alert-success" role="alert">{{Session('success')}}</div>
            @endif
            <div class="row align-items-center mb-4">
                @if (DB::table('our_stories')->count() > 1)

                <div class="col-lg-6 caption mb-4">
                    <h1 class="">{{$heroContent->title}}</h1>
                    <p>
                        {{$heroContent->description}}
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/hero/'.$heroContent->cover)}}" class="img-fluid page-img"
                        alt="Corporate Image" />
                </div>
                <div class="text-center mt-4">
                    <div class="text-center mt-4"><a href={{route('hero-content.edit',$heroContent->id)}} class="btn
                            btn-primary btn-lg">Update
                            Info</a>

                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="alert alert-danger text-center">No data Available</div>
            <div class="text-center mt-4">
                <a href={{route('hero-content.create')}} class="btn btn-primary btn-lg">create</a>
            </div>
            @endif
    </section> --}}
    <section class="our-story-section bg-light page-section">

        {{-- session messages --}}
        <div class="container text-center">
            @if (Session('success'))
            <div class="alert alert-success" role="alert">{{Session('success')}}</div>
            @endif
        </div>
        {{-- info --}}
        <div class="container">
            @if (DB::table('our_stories')->count() >= 1) <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('images/about_us/'.$aboutInfo->cover)}}" class="img-fluid page-img"
                        alt="{{$aboutInfo->heading}}" />
                </div>
                <div class="col-lg-6">
                    <h6>Our Story</h6>
                    <p class="story">
                        {{$aboutInfo->heading}}
                    </p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                Who We Are
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                Our Vision
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">
                                Our History
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <p>
                                {{$aboutInfo->about_us}}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <p>
                                {{$aboutInfo->vision}}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <p>
                                {{$aboutInfo->history}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href={{route('about-us.edit',$aboutInfo->id)}} class="btn
                        btn-primary btn-lg">Update
                        Info</a>

                </div>
            </div>
            @else
            <div class="alert alert-danger text-center">No data Available</div>
            <div class="text-center mt-4">
                <a href={{route('about-us.create')}} class="btn btn-primary btn-lg">create</a>
            </div>
            @endif
        </div>
    </section>
</x-adminLayout>