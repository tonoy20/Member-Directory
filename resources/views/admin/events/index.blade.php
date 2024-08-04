@extends('backend.layouts.master')

@section('content')

<div class="container">
    <a href="{{ route('events.create') }}" class="btn btn-sm btn-create btn-success mb-3">Create New Event</a>

  

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Header</th>
     
                <th>image</th>
              
                <th>Actions</th> <!-- New column for edit and delete buttons -->
            </tr>
        </thead>
        <tbody>
            @foreach($events as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->header }}</td>
               

                <td>
                    @if($e->image)
                        <img src="{{ asset($e->image) }}" alt="Image3" width="100">
                    @else
                        No Image
                    @endif
                </td>
                
            
                <td>
                    <a href="{{ route('events.edit', $e->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('events.destroy', $e->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
