@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h1>Edit Notice</h1>
    <form action="{{ route('notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="header">Header</label>
            <input type="text" class="form-control" id="header" name="header" value="{{ $notice->header }}" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Paragraph</label>
            <textarea class="form-control" id="paragraph" name="paragraph" rows="5" required>{{ $notice->paragraph }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($notice->image)
                <img src="{{ asset($notice->image) }}" alt="Current Image" class="mt-2" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
