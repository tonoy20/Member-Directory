@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex">
            <div class="sscicon">
                <img src="{{ asset('image/logo/ssc2020.png') }}" alt="">
            </div>
            <div class="section-title">
                <h1 class="text-center col-lg-10 col-md-12 col-12">SSC'99 Bhola District Member's Directory</h1>
            </div>
        </div>

        <div class="py-lg-4"></div>


        <div class="detailsPage">
            <div class="main-body">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('image/member/ssccan.png') }}" alt="" class="rounded"
                                        width="300">
                                    <div class="mt-3">
                                        <h4>{{ $member->name_english }}</h4>
                                        <p class="text-secondary mb-1">{{ $member->profession }}</p>

                                        <p class="text-muted font-size-sm">
                                            @if (!empty($member->present_address))
                                                {{ $member->present_address }}
                                            @endif
                                        </p>

                                        <!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 shadow-sm">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="fw-bold"><a class="text-decoration-none btn btn-primary badge"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="facebook account"
                                            href="{{ url($member->fb_url) }}">{{ $member->name_english }}.facebook</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name (Bangla)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->name_bangla }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name (English)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->name_english }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Blood Group</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->blood_group }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->gender }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profession</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->profession }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Upazilla</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->upazilla }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">School name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->school_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a class="fw-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                            href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->phone_number }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Present Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if (!empty($member->present_address))
                                            {{ $member->present_address }}
                                        @endif
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Permanent Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if (!empty($member->permanent_address))
                                            {{ $member->permanent_address }}
                                        @endif
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Reference</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->reference }}
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
