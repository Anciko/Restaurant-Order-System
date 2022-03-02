@extends('layouts.master')

@section('content')
    <div class="content-wrapper py-4">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-warning">Edit Dish</h2>
            <a href="{{ route('dishes.index') }}" class="btn btn-dark btn-sm">Back</a>
            @if (session('error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card p-4 mt-3">
                <form action="{{ route('dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name">Dish Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $dish->name }}">
                        @error('name')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Category</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $dish->category->id == $category->id ? "selected" : "" }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">

                        <label for="name">Image</label>
                        <div>
                            <span>Current Image =></span>
                            <a href="{{ asset("images/$dish->image") }}" target="_blank">
                                {{ $dish->image }}
                            </a>
                        </div>

                        <input type="file" class="form-control-file" name="dish_image">
                        @error('dish_image')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-warning text-white ml-2 btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
