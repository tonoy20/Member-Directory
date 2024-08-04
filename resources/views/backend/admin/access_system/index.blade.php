@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="py-lg-3 px-lg-4 py-md-3 px-md-3 py-3 px-3">
            <table class="table table-striped" style="width:100% !important">

                <tbody>
                    @php
                        // Define a mapping array for role names
                        $roleNames = [
                            1 => 'Super Admin',
                            2 => 'Admin',
                            3 => 'User',
                            4 => 'Watcher',
                            // Add more roles as needed
                        ];
                    @endphp

                    <div class="row">
                        @foreach ($userCounts as $userCount)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{-- Display role name based on role_id --}}
                                            @if (isset($roleNames[$userCount->role_id]))
                                                {{ $roleNames[$userCount->role_id] }}
                                            @else
                                                Unknown Role
                                            @endif
                                        </h5>
                                        <p class="card-text">
                                            Count: {{ $userCount->count }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </tbody>
            </table>
        </div>
    </div>
@endsection
