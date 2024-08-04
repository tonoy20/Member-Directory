@extends('backend.layouts.master')

@section('content')
    <style>
        .container {
            font-family: "Roboto Condensed", sans-serif;
            font-optical-sizing: auto;
        }
    </style>
    <div class="container">
        <h1 class="ps-lg-5">Edit Carousel Item</h1>

        <div class="p-lg-5">
            <form action="{{ route('carosels.update', $carosel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="fw-bold pb-lg-1 pb-md-1 pb-1">First Image</div>
                    @if ($carosel->image1)
                        <img src="{{ asset($carosel->image1) }}" class="object-fit-contain border rounded w-25"
                            alt="Image1">
                    @endif
                    <div class="pb-lg-2"></div>
                    <input type="file" class="form-control" id="image1" name="image1">
                </div>
                <div class="pb-lg-4"></div>
                <div class="form-group">
                    <div class="fw-bold pb-lg-1 pb-md-1 pb-1">Second Image</div>
                    @if ($carosel->image2)
                        <img src="{{ asset($carosel->image2) }}" alt="Image2"
                            class="object-fit-contain border rounded w-25">
                    @endif
                    <div class="pb-lg-2"></div>
                    <input type="file" class="form-control" id="image2" name="image2">
                </div>
                <div class="pb-lg-4"></div>
                <div class="form-group">
                    <div class="fw-bold pb-lg-1 pb-md-1 pb-1">Third Image</div>
                    @if ($carosel->image3)
                        <img src="{{ asset($carosel->image3) }}" alt="Image3"
                            class="object-fit-contain border rounded w-25">
                    @endif
                    <div class="pb-lg-2"></div>
                    <input type="file" class="form-control" id="image3" name="image3">
                </div>
                <div class="pb-lg-4"></div>

                <div class="text-end pt-lg-3"><button type="submit" class="btn btn-primary">Update</button></div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
