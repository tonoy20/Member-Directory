@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Carousel Items</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carosels as $carosel)
                    <tr>
                        <td>
                            @if($carosel->image1)
                                <img src="{{ asset($carosel->image1) }}" alt="Image1" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            @if($carosel->image2)
                                <img src="{{ asset($carosel->image2) }}" alt="Image2" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            @if($carosel->image3)
                                <img src="{{ asset($carosel->image3) }}" alt="Image3" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <!-- You can add actions like edit and delete here -->
                            <a href="{{ route('carosels.edit', $carosel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('carosels.destroy', $carosel->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
