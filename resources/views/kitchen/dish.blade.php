@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Dishes</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <a href="{{ route('dishes.create') }}" class="btn btn-info btn-sm float-right">
              <i class="fas fa-plus"></i>  Create Dish</a>
            <div class="clearfix"></div>
            @if (session('success'))
                <div class="col-md-6 offset-md-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->category->name }}</td>
                            <td>
                                <img src="{{ asset("images/$dish->image") }}" width="50" height="50" alt="">
                            </td>
                            <td>{{ $dish->created_at }}</td>

                            <td>
                                <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" class="d-inline">
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

        <!-- /.content -->
    </div>
@endsection





@section('script')
    <script>
        $(function() {
            // $("#example1").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
