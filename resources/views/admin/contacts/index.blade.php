@extends('backend.layouts.master')

@section('content')

<h1>contacts/index</h1>
<div class="container mt-5">
    <a href="{{route('contacts.create')}}" class="btn btn-sm btn-create btn-success"> create</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $e)
                <tr>
                    <td>{{ $e['id'] }}</td>
                    <td>{{ $e['name'] }}</td>
                    <td>{{ $e['email'] }}</td>
                    <td>{{ $e['phone'] }}</td>
                    <td>{{ $e['subject'] }}</td>
                    <td>{{ $e['message'] }}</td>
                    <td>{{ $e['created_at'] }}</td>
                    <td>{{ $e['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection