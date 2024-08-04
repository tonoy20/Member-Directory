@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h1>Create New Notice</h1>
    <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="header">Header</label>
            <input type="text" class="form-control" id="header" name="header" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Paragraph</label>
            <textarea class="form-control" id="paragraph" name="paragraph" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
