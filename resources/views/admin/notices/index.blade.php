@extends('backend.layouts.master')

@section('content')

<h1>Notices Index</h1>
<a href="{{ route('notices.create') }}" class="btn btn-sm btn-create btn-success">Create</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Header</th>
            <th>Paragraph</th> 
            <th>Image</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notices as $notice)
            <tr>
                <td>{{ $notice->id }}</td>
                <td>{{ $notice->header }}</td>
                <td>{{ $notice->paragraph }}</td>
                <td>
                    @if ($notice->image)
                        <img src="{{ asset($notice->image) }}" alt="Notice Image" width="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $notice->created_at }}</td>
                <td>{{ $notice->updated_at }}</td>
                <td>
                    <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this notice?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
