@extends('frontend.layouts.master')

@section('content')
    <div class="container">

        <div class="text-center pb-lg-4" data-aos="fade-up">
            <h1>About</h1>
        </div>


        <div class="card mb-3 about_section" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0 shadow">
                <div class="col-md-4">
                    <img src="{{ asset($about->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="about">
                            <h5 class="card-title text-center pt-lg-4">{{ $about['header'] }}</h5>
                            <p class="card-text p-lg-3">{{ $about['about'] }}</p>
                        </div>
                        <div class="about">
                            <h5 class="card-title text-center pt-lg-4">{{ $about['vision_header'] }}</h5>
                            <p class="card-text p-lg-3">{{ $about['vision_text'] }}</p>
                        </div>
                        <div class="about">
                            <h5 class="card-title text-center pt-lg-4">{{ $about['mission_header'] }}</h5>
                            <p class="card-text p-lg-3">{{ $about['mission_text'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  --}}

    </div> <br>
@endsection
