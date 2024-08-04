@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="container">
            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"
                class="form-control mt-3">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name"
                        value="{{ $user->name }}">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $user->email }}">

                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-success btn-sm ">save</button>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
