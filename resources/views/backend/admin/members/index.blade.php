@extends('backend.layouts.master')

@section('content')
<div class="container">
    <!-- Search form -->
    <div class="d-flex justify-content-end my-3">
        <div class="col-3">
            <div class="input-group">
                <span class="input-group-text">Search: </span>
                <input type="text" name="search" id="search" class="form-control" placeholder="Enter search term">
            </div>
        </div>
    </div>

    <!-- Display the members in a table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped p-3" id="members-table-body">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name (English)</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Profession</th>
                    <th>Blood Group</th>
                    <th>Upazilla</th>
                    <th>School Name</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <!-- Add other headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name_english }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        @if($member->image)
                            <img src="{{ asset($member->image) }}" alt="Image3" width="100">
                        @else
                            No Img
                        @endif
                    </td>
                    <td>{{ $member->profession }}</td>
                   
                    
                    <td>{{ $member->blood_group }}</td>
                    <td>{{ $member->upazilla }}</td>
                    <td>{{ $member->school_name }}</td>
                    <td>{{ $member->phone_number }}</td>
                    <td>
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <select name="status" class="form-select w-75" data-member-id="{{ $member->id }}">
                            <option value="approved" {{ $member->status == 'approved' ? 'selected' : '' }}>
                                approved
                            </option>
                            <option value="pending" {{ $member->status == 'pending' ? 'selected' : '' }}>
                                pending
                            </option>
                        </select>
                        @else
                        {{ $member->status }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Display pagination links -->
    <div>
        {{ $members->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Search bar functionality
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
                    $('#members-table-body tbody').html(''); // Clear existing rows
                    $.each(data.data, function(index, member) {
                        let row = `<tr>
                            <td>${member.id}</td>
                            <td>${member.name_english}</td>
                            <td>${member.email}</td>
                            <td>${member.profession}</td>
                            <td>${member.blood_group}</td>
                            <td>${member.upazilla}</td>
                            <td>${member.school_name}</td>
                            <td>${member.phone_number}</td>
                            <td>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                    <select name="status" class="form-select w-75" data-member-id="${member.id}">
                                        <option value="approved" ${member.status == 'approved' ? 'selected' : ''}>
                                            approved
                                        </option>
                                        <option value="pending" ${member.status == 'pending' ? 'selected' : ''}>
                                            pending
                                        </option>
                                    </select>
                                @else
                                    ${member.status}
                                @endif
                            </td>
                            <td>
                                <a href="/members/${member.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                                <form action="/members/${member.id}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                </form>
                            </td>
                        </tr>`;
                        $('#members-table-body tbody').append(row); // Append each row to the table
                    });

                    // Update pagination links
                    $('.pagination').html(data.links);

                    // Reattach the change event listener after updating the table
                    attachChangeEventListeners();
                },

                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                    // Optionally, you can display an error message or handle the error here
                }
            });
        });

        // Function to attach change event listeners to status dropdowns
        function attachChangeEventListeners() {
            $('select[name="status"]').change(function() {
                let memberId = +$(this).attr('data-member-id'); // Convert member_id to a number using +
                let newStatus = $(this).val();
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                let data = {
                    member_id: memberId,
                    status: newStatus
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('member.status') }}",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        console.log('successfully changed status');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        }

        // Initial call to attach event listeners
        attachChangeEventListeners();
    });
</script>
@endsection
