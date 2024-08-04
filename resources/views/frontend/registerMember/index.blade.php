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

        <div class="row pt-lg-4 pb-lg-0 pb-md-4 pb-3">
            <div class="col-sm-12 col-md-12 drop">
                <div class="d-flex justify-content-center">
                    <select name="" id="" class="dropUpa">
                        <option value="">Select Upazilla</option>
                        <option value="Bhola Sadar">Bhola Sadar</option>
                        <option value="Borhanuddin">Borhanuddin</option>
                        <option value="Charfesson">Charfesson</option>
                        <option value="Doulatkhan">Doulatkhan</option>
                        <option value="Monpura">Monpura</option>
                        <option value="Tazumuddin">Tazumuddin</option>
                        <option value="Lalmohan">Lalmohan</option>
                    </select>
                    <div class="pe-lg-3 pe-md-3 pe-3"></div>
                    <select name="" id="" class="dropUpa">
                        <option value="1" selected disabled>Select Profession</option>
                        <option value="2">Govt. service holder</option>
                        <option value="3">Private service holder</option>
                        <option value="4">Businessman</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="row pt-lg-4 pb-lg-0 pb-md-4 pb-3">
                <div class="col-sm-12 col-md-9 col-7">
                    <label for="" class="d-flex">
                        <div class="pe-2">Show</div>
                        <select name="" id="" class="custom-select px-lg-2">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <div class="ps-2">entries</div>
                    </label>
                </div>

                <div class="col-3">
                    <div class="input-group">
                        <span class="input-group-text">Search: </span>
                        <input type="text" name="search" id="search" class="form-control"
                            placeholder="Enter search term">
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-lg-4"></div>
        {{-- Display members --}}
        <div class="row" id="members-table-body">
            @foreach ($members as $member)
                <div class="col-sm-12 col-md-4 pb-lg-4 pb-md-2 pb-2 indexCard">
                    <div class="card shadow">
                        <div class="bg-image hover-zoom">
                            <img src="{{asset($member->image)}}" class="card-img-top" alt="">
                        </div>

                        <div class="card-body px-lg-5">
                            <h6 class="card-title nameB">{{ $member->name_bangla }}</h6>
                            <h6 class="card-title nameE pb-lg-4">{{ $member->name_english }}</h6>
                            <div class="card-text">
                                <div><strong>Upazilla:</strong> {{ $member->upazilla }}</div>
                                <div><strong>Profession:</strong> {{ $member->profession }}</div>
                                <div><strong>Blood Group:</strong> {{ $member->blood_group }}</div>
                                <div><strong>Phone Number: </strong> {{ $member->phone_number }}</div>
                                <div><strong>Email:</strong> <a class="text-decoration-none"
                                        href="mailto:{{ $member->email }}">{{ $member->email }}</a></div>
                                <div class="pt-lg-3">
                                    <a href="{{ route('frontend.registerMember.details', $member->id) }}"
                                        class="text-decoration-none text-dark"><button>Details...</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pt-lg-5 pt-md-5 pt-4"></div>

    <!-- Display pagination links -->
    <div class="container">
        {{ $members->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection

@section('script')
    <script>
        $('#search').on('input', function() {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('members.search') }}", // Ensure this route matches your defined route
                type: "GET",
                data: {
                    'search': query
                },
                success: function(data) {
                    console.log('Search results:', data); // Log the search results received
                    $('#members-table-body').html(''); // Clear existing cards
                    $.each(data.data, function(index, member) {
                        let card = `
                            <div class="col-sm-12 col-md-4 pb-lg-4 pb-md-2 pb-2 indexCard">
                                <div class="card shadow">
                                    <div class="bg-image hover-zoom">
                                        <img src="image/member/ssccan.png" class="card-img-top" alt="">
                                    </div>
                                    <div class="card-body px-lg-5">
                                        <h6 class="card-title nameB">${member.name_bangla}</h6>
                                        <h6 class="card-title nameE pb-lg-4">${member.name_english}</h6>
                                        <div class="card-text">
                                            <div><strong>Upazilla:</strong> ${member.upazilla}</div>
                                            <div><strong>Profession:</strong> ${member.profession}</div>
                                            <div><strong>Blood Group:</strong> ${member.blood_group}</div>
                                            <div><strong>Phone Number: </strong> ${member.phone_number}</div>
                                            <div><strong>Email:</strong> <a class="text-decoration-none" href="mailto:${member.email}">${member.email}</a></div>
                                            <div class="pt-lg-3">
                                                <a href="{{ route('frontend.registerMember.details', '') }}/${member.id}" class="text-decoration-none text-dark"><button>Details...</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        $('#members-table-body').append(
                        card); // Append each card to the container
                    });

                    // Update pagination links if needed
                    $('.pagination').html(data.links);
                },

                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                    // Optionally, you can display an error message or handle the error here
                }
            });
        });
    </script>
@endsection
