@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="text-center pb-lg-4" data-aos="fade-up">
            <h1>Event</h1>
        </div>


        <div class="card mb-3 about_section" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0 shadow">
                <div class="col-md-4">
                    <img src="{{ asset($event->image) }}" class="img-fluid rounded-start" style="height: 18rem"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center pt-lg-4">{{ $event['header'] }}</h5>
                        <p class="card-text p-lg-3">{{ $event['paragraph'] }}</p>
                        <p class="card-text text-end">{{ $event['created_at'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{--  --}}

    </div> <br>
@endsection
