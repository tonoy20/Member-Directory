@extends('frontend.layouts.master')

@section('content')
    <div class="entryform">
        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-8">
                        <div class="card rounded-3 shadow">
                            <div class="card-body p-md-5 p-4">
                                <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Member Registration</h2>

                                <form class="px-md-2" id="reg_form" action="{{ route('frontend.registerMember.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1q" class="form-control" name="nameB"
                                            placeholder="Name (Bangla)" required />
                                        <label class="form-label" for="form3Example1q"></label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example2q" class="form-control" name="nameE"
                                            placeholder="Name (English)" required />
                                        <label class="form-label" for="form3Example2q"></label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label text-light" for="customFile">Enter image</label>
                                        <input type="file" class="form-control" name="image" />
                                    </div>

                                    <div class="form-outline station mb-4">
                                        <select class="form-control" name="upazilla" required>
                                            <option value="">Select Upazilla</option>
                                            <option value="Bhola Sadar">Bhola Sadar</option>
                                            <option value="Borhanuddin">Borhanuddin</option>
                                            <option value="Charfesson">Charfesson</option>
                                            <option value="Doulatkhan">Doulatkhan</option>
                                            <option value="Monpura">Monpura</option>
                                            <option value="Tazumuddin">Tazumuddin</option>
                                            <option value="Lalmohan">Lalmohan</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <select class="form-control" name="profession" required>
                                                <option value="" selected disabled>Select Profession</option>
                                                <option value="Govt. service holder">Govt. service holder</option>
                                                <option value="Private service holder">Private service holder</option>
                                                <option value="Businessman">Businessman</option>
                                            </select>

                                        </div>
                                        <div class="col-md-6 mb-4">

                                            <select class="form-control" name="b_grp" required>
                                                <option value="1" selected disabled>Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row pb-md-0">
                                        <div class="mb-lg-4">
                                            <div class="form-outline">
                                                <input type="text" id="formexampleSchool" class="form-control"
                                                    name="schoolname" placeholder="Enter School Name" />
                                                {{-- <select class="form-control" name="schoolname" required>
                                                    <option value="" selected disabled>Select School</option>
                                                    <option value="Bhola Zilla School-1">Bhola Zilla School-1</option>
                                                    <option value="Bhola Zilla School-2">Bhola Zilla School-2</option>
                                                    <option value="Bhola Zilla School-3">Bhola Zilla School-3</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pb-md-0">
                                        <div class="mb-lg-4">
                                            <div class="form-outline">
                                                <select class="form-control" name="gender" required>
                                                    <option value="" selected disabled>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mt-lg-4">
                                        <input type="text" id="form3Example1q" class="form-control" name="presentAddress"
                                            placeholder="Present Address (optional)" />
                                        <label class="form-label" for="form3Example1q"></label>
                                    </div>

                                    <div class="form-outline">
                                        <input type="text" id="form3Example1q" class="form-control"
                                            name="permanentAddress" placeholder="Permanent Address (optional)" />
                                        <label class="form-label" for="form3Example1q"></label>
                                    </div>

                                    <div class="form-outline">
                                        <input type="url" id="form3Example1q" class="form-control" name="fb_url"
                                            placeholder="Facebook Link" required />
                                        <label class="form-label" for="form3Example1q"></label>
                                    </div>

                                    <div class="form-outline">
                                        <input type="text" id="form3Example1q" class="form-control" name="reference"
                                            placeholder="Reference (If any)" />
                                        <label class="form-label" for="form3Example1q"></label>
                                    </div>


                                    <div class="row pt-4 pb-md-0">
                                        <div class="">
                                            <div class="form-outline">
                                                <div class="input-group">
                                                    <span class="input-group-text">+</span>
                                                    <input type="text" class="form-control" name="phoneNumber"
                                                        placeholder="Contact Number (880)" id="phoneNumber" required />
                                                </div>
                                                <label class="form-label" for="form3Example1mobile"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pb-2 pb-md-0 mb-md-5">
                                        <div class="">
                                            <div class="form-outline">
                                                <input type="email" id="form3Example1email" class="form-control"
                                                    name="email" placeholder="Email " required />
                                                <label class="form-label" for="form3Example1mobile"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" value="Submit" class="btn btn-success btn-lg mb-1"></input>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <script>
        var input = document.getElementById('phoneNumber');

        input.oninvalid = function(event) {
            event.target.setCustomValidity('Contact number should contain 880 e.g. 880xxxx');
        }
    </script> --}}
@endsection
