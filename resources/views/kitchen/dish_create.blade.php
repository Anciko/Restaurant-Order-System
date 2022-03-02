@extends('layouts.master')

@section('content')
    <div class="content-wrapper py-4">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-warning">Create Dish</h2>
            <a href="" class="btn btn-dark btn-sm">Back</a>
            @if (session('error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card p-4 mt-3">
                <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Dish Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="name">Category</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Image</label>
                        <input type="file" class="form-control-file" name="dish_image">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-warning text-white ml-2 btn-sm">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
