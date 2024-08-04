@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create New About Entry
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="header" class="form-label">Header</label>
                                <input type="text" class="form-control" id="header" name="header" required>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">About</label>
                                <textarea class="form-control" id="about" name="about" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="mission_header" class="form-label">Mission Header</label>
                                <input type="text" class="form-control" id="mission_header" name="mission_header" required>
                            </div>
                            <div class="mb-3">
                                <label for="mission_text" class="form-label">Mission Text</label>
                                <textarea class="form-control" id="mission_text" name="mission_text" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="vision_header" class="form-label">Vision Header</label>
                                <input type="text" class="form-control" id="vision_header" name="vision_header" required>
                            </div>
                            <div class="mb-3">
                                <label for="vision_text" class="form-label">Vision Text</label>
                                <textarea class="form-control" id="vision_text" name="vision_text" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create About Entry</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
