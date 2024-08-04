@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="py-lg-3 px-lg-4 py-md-3 px-md-3 py-3 px-3">
            <table class="dataTable table table-striped" style="width:100% !important">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUsers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (Auth::user()->role_id == 1)
                                    <select name="role_id" class="form-select w-75" data-user-id="{{ $user->id }}">
                                        <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Admin</option>
                                        <option value="4" {{ $user->role_id == 4 ? 'selected' : '' }}>watcher</option>
                                        <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>User</option>
                                     
                                    </select>
                                @else
                                    {{ $user->role }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this member?')" style="border: none; background-color: transparent; color: #ff0000;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $allUsers->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // Initialize DataTable
            
            // Add event listener for role change
            $('select[name="role_id"]').each(function() {
                $(this).change(function() {
                    let userId = $(this).attr('data-user-id');
                    let newRoleId = $(this).val();
                    let csrfToken = $('meta[name="csrf-token"]').attr('content');
                    let data = {
                        user_id: userId,
                        role_id: newRoleId
                    };
                    $.ajax({
                        url: '/change-role', // Replace with your route for updating roles
                        method: 'POST',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Add CSRF token to headers
                        },

                        success: function(response) {
                            // Handle success response
                            console.log(response);
                        },

                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

            //dataTable design 
            
        
        });
    </script>
@endsection
