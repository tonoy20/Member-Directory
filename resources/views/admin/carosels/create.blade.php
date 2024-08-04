@extends('backend.layouts.master')

@section('content')
    <style>
        .container {
            font-family: "Roboto Condensed", sans-serif;
            font-optical-sizing: auto;
        }
    </style>
    <div class="container">
        <h1 class="ps-lg-5">Create New Carousel Item</h1>
        <div class="p-lg-5">
            <form action="{{ route('carosels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image1" class="pb-lg-1 pb-md-1 pb-1">Enter Carosel First Image</label>
                    <input type="file" class="form-control" id="image1" name="image1" required>
                </div>
                <div class="pb-lg-4"></div>
                <div class="form-group">
                    <label for="image2" class="pb-lg-1 pb-md-1 pb-1">Enter Carosel Second Image</label>
                    <input type="file" class="form-control" id="image2" name="image2">
                </div>
                <div class="pb-lg-4"></div>
                <div class="form-group">
                    <label for="image3" class="pb-lg-1 pb-md-1 pb-1">Enter Carosel Third Image</label>
                    <input type="file" class="form-control" id="image3" name="image3">
                </div>
                <div class="pb-lg-4"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
