@extends('backend.layouts.master')

@section('content')
<div class="container">
    
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for update -->

        <div class="form-group">
            <label for="header">Header</label>
            <input type="text" class="form-control" id="header" name="header" value="{{ $event->header }}" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Paragraph</label>
            <textarea class="form-control" id="paragraph" name="paragraph" rows="5" required>{{ $event->paragraph }}</textarea>
        </div>
        <div class="form-group">
            <label for="current_image">Current Image</label><br>
            @if ($event->image)
                <img src="{{ asset($event->image) }}" alt="Current Image" style="max-width: 300px;">
            @else
                <p>No image available</p>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Upload New Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
