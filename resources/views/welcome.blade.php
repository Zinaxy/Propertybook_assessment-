@php
$num = 1;
@endphp

@extends('layouts.app')

@section('content')
<!-- Navbar -->
<x-Navbar />

<!-- Hero Section -->
<section class="hero-section text-white bg-primary" id="hero">
    <div class="container text-center">
        <div class="row align-items-center">
            @if (DB::table('heroes')->count() >= 1)
            <div class="col-lg-6 caption mb-4">
                <h1 class="text-white">{{$heroContent->title}}</h1>
                <p>{{$heroContent->description}}</p>
                <a href="#services" class="btn btn-light smooth-scroll">Get Started</a>
                <span>
                    <a href="#" class="play text-white"><img src="./images/play.svg" alt="" /></a>
                    <span class="m-2">Watch Intro</span>
                </span>
            </div>
            <div class="col-lg-6">
                <img src="{{asset('images/hero/'.$heroContent->cover)}}" class="img-fluid page-img"
                    alt="Corporate Image" />
            </div>
            @else
            <div class="col-lg-6 caption mb-4">
                <h1 class="text-white">Corporate Website</h1>
                <p>We are a digital agency that helps brands to achieve their business outcomes. We see technology as a
                    tool to create amazing things.</p>
                <a href="#services" class="btn btn-light smooth-scroll">Get Started</a>
                <span>
                    <a href="#" class="play text-white"><img src="./images/play.svg" alt="" /></a>
                    <span class="m-2">Watch Intro</span>
                </span>
            </div>
            <div class="col-lg-6">
                <img src="./images/corporate.webp" class="img-fluid page-img" alt="Corporate Image" />
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="our-story-section bg-light page-section" id="#aboutus">
    <div class="container">
        @if (DB::table('our_stories')->count() >= 1)
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('images/about_us/'.$aboutInfo->cover)}}" class="img-fluid page-img"
                    alt="{{$aboutInfo->heading}}" />
            </div>
            <div class="col-lg-6">
                <h6>Our Story</h6>
                <p class="story">{{$aboutInfo->heading}}</p>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Who We Are</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Our Vision</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Our History</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <p>{{$aboutInfo->about_us}}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p>{{$aboutInfo->vision}}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p>{{$aboutInfo->history}}</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <x-OurStory />
        @endif
    </div>
</section>

<!-- Services Section -->
<section class="services-section bg-white page-section" id="services">
    <div class="container text-center">
        <h6 class="pill-heading text-primary border border-primary p-1">Services</h6>
        <div class="row">
            @forelse ($services as $item)
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="icon mb-3">
                            <img src="{{asset('images/services_icons/'.$item->icon)}}" alt="" />
                        </div>
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                </div>
            </div>
            @empty
            <x-ServiceComponent />
            @endforelse
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section page-section bg-light" id="pricing">
    <div class="container text-center">
        <h6 class="pill-heading text-primary border border-primary p-1">Pricing</h6>
        <div class="row">
            @forelse ($prices as $price)
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 @if ($num==2) class="card-title btn btn-primary text-white btn-sm" @else
                            class="card-title btn btn-outline-primary btn-sm" @endif>
                            {{$price->name}}
                        </h5>
                        <p class="card-text">{{$price->title}}</p>
                        <h3><sup>$</sup>{{$price->price}}<span>/mo</span></h3>
                        <a href="#" @if ($num==2) class="btn btn-primary" @else class="btn btn-outline-primary"
                            @endif>Start Free Trial</a>
                        <div class="list">
                            <ul>
                                @forelse ($price->bullets as $item)
                                <li>
                                    <div class="item text-success">
                                        <i class="bi bi-check-circle text-primary"></i><span>{{$item}}</span>
                                    </div>
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $num++;
            @endphp
            @empty
            <x-PriceComponent />
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section text-white bg-primary py-5">
    <div class="container text-center">
        <h2>We love to make perfect solutions for your business</h2>
        <p>Why I say old chap that is, spiffing off his nut cor blimey guvnor gosh crikey...</p>
        <a href="#services" class="btn btn-outline-light smooth-scroll">Get Started</a>
    </div>
</section>
@endsection