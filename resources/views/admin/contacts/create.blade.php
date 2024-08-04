@extends('frontend.layouts.master')

@section('content')
    <div class="pt-lg-2"></div>
    <div class="shadow rounded container px-lg-5 contact_p">
        <h1 class="text-center pt-lg-5 pt-md-4 pt-3">Contact Us</h1>
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group pt-lg-4 pt-md-3 pt-3 pb-lg-4 pb-md-3 pb-3 col">
                    <label for="name" class="pb-lg-2">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group pt-lg-4 pt-md-3 pt-3 pb-lg-4 pb-md-3 pb-3 col">
                    <label for="email" class="pb-lg-2">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group pb-lg-4">
                <label for="phone" class="pb-lg-2">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group pb-lg-4">
                <label for="subject" class="pb-lg-2">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group pb-lg-4">
                <label for="message" class="pb-lg-2">Message</label>
                <textarea class="form-control" id="message" name="message" rows="10" required></textarea>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success rounded shadow-sm">Submit</button>
            </div>

            <div class="pb-lg-4"></div>
        </form>
    </div>
    <div class="pt-lg-5"></div>
@endsection
