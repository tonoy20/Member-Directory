@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Member</h1>
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nameB">Name (Bangla)</label>
                <input type="text" class="form-control" id="nameB" name="nameB" value="{{ $member->name_bangla }}" required>
            </div>
            <div class="form-group">
                <label for="nameE">Name (English)</label>
                <input type="text" class="form-control" id="nameE" name="nameE" value="{{ $member->name_english }}" required>
            </div>
            <div class="form-group">
                <label for="upazilla">Upazilla</label>
                <input type="text" class="form-control" id="upazilla" name="upazilla" value="{{ $member->upazilla }}" required>
            </div>
            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" class="form-control" id="profession" name="profession" value="{{ $member->profession }}" required>
            </div>
            <div class="form-group">
                <label for="b_grp">Blood Group</label>
                <input type="text" class="form-control" id="b_grp" name="b_grp" value="{{ $member->blood_group }}" required>
            </div>
            <div class="form-group">
                <label for="schoolname">School Name</label>
                <input type="text" class="form-control" id="schoolname" name="schoolname" value="{{ $member->school_name }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ $member->gender }}" required>
            </div>
            <div class="form-group">
                <label for="presentAddress">Present Address</label>
                <input type="text" class="form-control" id="presentAddress" name="presentAddress" value="{{ $member->present_address }}" required>
            </div>
            <div class="form-group">
                <label for="permanentAddress">Permanent Address</label>
                <input type="text" class="form-control" id="permanentAddress" name="permanentAddress" value="{{ $member->permanent_address }}" required>
            </div>
            <div class="form-group">
                <label for="fb_url">Facebook URL</label>
                <input type="text" class="form-control" id="fb_url" name="fb_url" value="{{ $member->fb_url }}">
            </div>
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" class="form-control" id="reference" name="reference" value="{{ $member->reference }}">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $member->phone_number }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($member->image)
                    <img src="{{ asset($member->image) }}" alt="Member Image" class="mt-2" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
